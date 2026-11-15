/**
 * ANDESCON 2027 — behaviour only.
 *
 * Every string and every dialog body is rendered by PHP; this file just
 * wires up dialogs, the program tabs and the mobile navigation.
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
	const dropTrigger = qs( '.dropdown > button' );
	const dropPanel = qs( '.dropdown-panel' );

	const closeDropdown = () => {
		if ( dropTrigger && dropPanel ) {
			dropTrigger.setAttribute( 'aria-expanded', 'false' );
			dropPanel.hidden = true;
		}
	};

	if ( dropTrigger && dropPanel ) {
		dropTrigger.addEventListener( 'click', () => {
			const isOpen = dropTrigger.getAttribute( 'aria-expanded' ) === 'true';
			dropTrigger.setAttribute( 'aria-expanded', String( ! isOpen ) );
			dropPanel.hidden = isOpen;
		} );
	}

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
		if ( ! ( event.target instanceof Element ) || ! event.target.closest( '.dropdown' ) ) {
			closeDropdown();
		}
	} );

	document.addEventListener( 'keydown', ( event ) => {
		if ( event.key !== 'Escape' || document.querySelector( 'dialog[open]' ) ) {
			return;
		}

		if ( dropPanel && ! dropPanel.hidden ) {
			closeDropdown();
			if ( dropTrigger ) {
				dropTrigger.focus();
			}
		} else if ( nav && nav.classList.contains( 'open' ) && toggle ) {
			toggle.click();
			toggle.focus();
		}
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
