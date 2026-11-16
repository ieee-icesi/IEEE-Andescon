/**
 * ANDESCON 2027 — behaviour only.
 *
 * Every string and every dialog body is rendered by PHP; this file just
 * wires up dialogs, the program tabs, the mobile navigation, the countdown
 * and the add-to-calendar menu.
 */
( () => {
	'use strict';

	const qs = ( selector, context = document ) => context.querySelector( selector );
	const qsa = ( selector, context = document ) => Array.from( context.querySelectorAll( selector ) );

	/* ---------------------------------------------------------------- Dialogs */

	let lastOpener = null;

	const openDialog = ( dialog, opener ) => {
		if ( ! dialog ) {
			return;
		}
		lastOpener = opener || document.activeElement;
		dialog.showModal();
	};

	const closeDialog = ( dialog ) => {
		if ( dialog ) {
			dialog.close();
		}
	};

	qsa( '[data-dialog]' ).forEach( ( trigger ) => {
		trigger.addEventListener( 'click', ( event ) => {
			event.preventDefault();
			openDialog( document.getElementById( `dialog-${ trigger.dataset.dialog }` ), trigger );
		} );
	} );

	qsa( 'dialog.info-dialog' ).forEach( ( dialog ) => {
		qsa( '.dialog-close, .dialog-done', dialog ).forEach( ( button ) => {
			button.addEventListener( 'click', () => closeDialog( dialog ) );
		} );

		dialog.addEventListener( 'click', ( event ) => {
			if ( event.target === dialog ) {
				const rect = dialog.getBoundingClientRect();
				const outside =
					event.clientX < rect.left ||
					event.clientX > rect.right ||
					event.clientY < rect.top ||
					event.clientY > rect.bottom;

				if ( outside ) {
					closeDialog( dialog );
				}
			}

			if ( event.target instanceof Element && event.target.closest( '.dialog-link' ) ) {
				closeDialog( dialog );
			}
		} );

		dialog.addEventListener( 'close', () => {
			if ( lastOpener && lastOpener.isConnected ) {
				lastOpener.focus();
			}
			lastOpener = null;
		} );
	} );

	/* ----------------------------------------------------------- Program tabs */

	const tabs = qsa( '.day-tabs [role="tab"]' );
	const panels = qsa( '.day-panels [role="tabpanel"]' );

	const selectDay = ( index, moveFocus = false ) => {
		tabs.forEach( ( tab, i ) => {
			const active = i === index;
			tab.setAttribute( 'aria-selected', String( active ) );
			tab.tabIndex = active ? 0 : -1;

			if ( panels[ i ] ) {
				panels[ i ].hidden = ! active;
			}
		} );

		if ( moveFocus && tabs[ index ] ) {
			tabs[ index ].focus();
		}
	};

	if ( tabs.length ) {
		const count = tabs.length;

		tabs.forEach( ( tab, i ) => {
			tab.addEventListener( 'click', () => selectDay( i ) );

			tab.addEventListener( 'keydown', ( event ) => {
				let next;

				if ( event.key === 'ArrowRight' || event.key === 'ArrowDown' ) {
					next = ( i + 1 ) % count;
				} else if ( event.key === 'ArrowLeft' || event.key === 'ArrowUp' ) {
					next = ( i - 1 + count ) % count;
				} else if ( event.key === 'Home' ) {
					next = 0;
				} else if ( event.key === 'End' ) {
					next = count - 1;
				}

				if ( next !== undefined ) {
					event.preventDefault();
					selectDay( next, true );
				}
			} );
		} );

		selectDay( 0 );
	}

	/* ------------------------------------------------------ Navigation / menu */

	const toggle = qs( '.menu-toggle' );
	const nav = qs( '#navigation' );
	const canHover = window.matchMedia( '(hover: hover) and (min-width: 1031px)' );

	const drops = qsa( '.dropdown' )
		.map( ( root ) => ( { root, button: qs( ':scope > button', root ), panel: qs( '.mega', root ), timer: 0, byHover: false } ) )
		.filter( ( drop ) => drop.button && drop.panel );

	const setOpen = ( drop, open ) => {
		clearTimeout( drop.timer );
		drop.button.setAttribute( 'aria-expanded', String( open ) );
		drop.panel.hidden = ! open;
		if ( ! open ) {
			drop.byHover = false;
		}
	};

	const closeDropdown = ( except ) => {
		drops.forEach( ( drop ) => {
			if ( drop !== except ) {
				setOpen( drop, false );
			}
		} );
	};

	const openDrop = () => drops.find( ( drop ) => ! drop.panel.hidden );

	drops.forEach( ( drop ) => {
		drop.button.addEventListener( 'click', () => {
			// A panel just opened by hovering stays open on the follow-up click.
			if ( drop.byHover ) {
				drop.byHover = false;
				return;
			}
			const open = drop.panel.hidden;
			closeDropdown( drop );
			setOpen( drop, open );
		} );

		drop.root.addEventListener( 'mouseenter', () => {
			if ( ! canHover.matches ) {
				return;
			}
			clearTimeout( drop.timer );
			if ( drop.panel.hidden ) {
				closeDropdown( drop );
				setOpen( drop, true );
				drop.byHover = true;
			}
		} );

		drop.root.addEventListener( 'mouseleave', () => {
			if ( canHover.matches ) {
				drop.timer = setTimeout( () => setOpen( drop, false ), 250 );
			}
		} );
	} );

	if ( toggle && nav ) {
		toggle.addEventListener( 'click', () => {
			const open = nav.classList.toggle( 'open' );
			toggle.setAttribute( 'aria-expanded', String( open ) );

			if ( ! open ) {
				closeDropdown();
			}
		} );

		qsa( 'a', nav ).forEach( ( link ) => {
			link.addEventListener( 'click', () => {
				closeDropdown();

				if ( nav.classList.contains( 'open' ) ) {
					toggle.click();
				}
			} );
		} );
	}

	document.addEventListener( 'click', ( event ) => {
		if ( ! ( event.target instanceof Element ) || ! event.target.closest( '.dropdown' ) ) {
			closeDropdown();
		}
	} );

	document.addEventListener( 'focusin', ( event ) => {
		const inside = event.target instanceof Element && event.target.closest( '.dropdown' );
		closeDropdown( drops.find( ( drop ) => drop.root === inside ) );
	} );

	document.addEventListener( 'keydown', ( event ) => {
		if ( event.key !== 'Escape' || document.querySelector( 'dialog[open]' ) ) {
			return;
		}

		const open = openDrop();

		if ( open ) {
			setOpen( open, false );
			open.button.focus();
		} else if ( nav && nav.classList.contains( 'open' ) && toggle ) {
			toggle.click();
			toggle.focus();
		}
	} );

	/* -------------------------------------------------------------- Countdown */

	const clock = qs( '[data-countdown]' );

	if ( clock ) {
		const target = Date.parse( clock.dataset.countdown );
		const units = {};
		qsa( '[data-unit]', clock ).forEach( ( el ) => {
			units[ el.dataset.unit ] = el;
		} );
		const pad = ( n ) => String( n ).padStart( 2, '0' );

		const tick = () => {
			const left = Math.max( 0, Math.floor( ( target - Date.now() ) / 1000 ) );
			units.days.textContent = String( Math.floor( left / 86400 ) );
			units.hours.textContent = pad( Math.floor( ( left % 86400 ) / 3600 ) );
			units.minutes.textContent = pad( Math.floor( ( left % 3600 ) / 60 ) );
			units.seconds.textContent = pad( left % 60 );
			return left;
		};

		if ( tick() > 0 ) {
			const timer = setInterval( () => {
				if ( tick() === 0 ) {
					clearInterval( timer );
				}
			}, 1000 );
		}
	}

	/* -------------------------------------------------- Add-to-calendar menu */

	const calendar = qs( '.add-calendar' );

	if ( calendar ) {
		document.addEventListener( 'click', ( event ) => {
			if ( calendar.open && ! calendar.contains( event.target ) ) {
				calendar.open = false;
			}
		} );

		calendar.addEventListener( 'keydown', ( event ) => {
			if ( event.key === 'Escape' && calendar.open ) {
				calendar.open = false;
				qs( 'summary', calendar ).focus();
			}
		} );

		qsa( '.add-calendar-menu a', calendar ).forEach( ( link ) => {
			link.addEventListener( 'click', () => {
				calendar.open = false;
			} );
		} );
	}

	/* ------------------------------------------------- Discover carousels */

	document.querySelectorAll( '.discover-group' ).forEach( ( group ) => {
		const track = group.querySelector( '.discover-track' );
		const prev = group.querySelector( '[data-scroll="-1"]' );
		const next = group.querySelector( '[data-scroll="1"]' );

		if ( ! track || ! prev || ! next ) {
			return;
		}

		const update = () => {
			prev.disabled = track.scrollLeft <= 2;
			next.disabled = track.scrollLeft + track.clientWidth >= track.scrollWidth - 2;
		};

		[ prev, next ].forEach( ( button ) => {
			button.addEventListener( 'click', () => {
				track.scrollBy( { left: Number( button.dataset.scroll ) * track.clientWidth * 0.75, behavior: 'smooth' } );
			} );
		} );

		track.addEventListener( 'scroll', update, { passive: true } );
		window.addEventListener( 'resize', update );
		update();
	} );

	/* -------------------------------------------------------- Preview banner */

	const dismiss = qs( '[data-dismiss-prototype]' );

	if ( dismiss ) {
		dismiss.addEventListener( 'click', () => {
			const banner = dismiss.closest( '.prototype' );

			if ( banner ) {
				banner.hidden = true;
			}
		} );
	}
} )();
