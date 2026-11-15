<?php
/**
 * Content model for the ANDESCON 2027 landing page.
 *
 * Every string rendered by the templates lives here. Templates stay
 * markup-only so the copy can later be swapped for CPTs or an options
 * page without touching a single section file.
 *
 * @package Andescon_Theme
 */

declare( strict_types = 1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The nine research tracks.
 *
 * @return array<int, array{title: string, summary: string, topics: string, icon: string}>
 */
function andescon_tracks(): array {
	return array(
		array(
			'title'   => 'Computational Intelligence & Data Science',
			'summary' => 'Learning systems, data-driven discovery and computational methods.',
			'topics'  => 'Machine learning · Data analytics · Intelligent systems',
			'icon'    => '<circle cx="12" cy="12" r="3"/><path d="M12 1v5m0 12v5M1 12h5m12 0h5M4 4l4 4m8 8 4 4M4 20l4-4M16 8l4-4"/>',
		),
		array(
			'title'   => 'Power, Energy & Smart Grids',
			'summary' => 'Engineering the energy systems of tomorrow.',
			'topics'  => 'Power systems · Renewable energy · Smart grids',
			'icon'    => '<path d="M14 2 4 14h7l-1 8 10-13h-7z"/>',
		),
		array(
			'title'   => 'Robotics, Control & Automation',
			'summary' => 'Connecting sensing, decisions and physical action.',
			'topics'  => 'Robotic systems · Control theory · Industrial automation',
			'icon'    => '<circle cx="7" cy="15" r="2"/><circle cx="14" cy="7" r="2"/><path d="m8 13 5-4m3-1 4 3m0 0-2 3m2-3 2 2M7 17v3M3 22h9M13 5l-2-3"/>',
		),
		array(
			'title'   => 'Telecommunications & Networks',
			'summary' => 'Communication systems for a connected world.',
			'topics'  => 'Wireless communications · Network architectures · Connectivity',
			'icon'    => '<path d="M12 9v13m-5 0h10M8 5a6 6 0 0 0 0 10m8-10a6 6 0 0 1 0 10M5 2a10 10 0 0 0 0 16M19 2a10 10 0 0 1 0 16"/><circle cx="12" cy="9" r="1.5"/>',
		),
		array(
			'title'   => 'Circuits, Devices & Electronic Systems',
			'summary' => 'From devices to the systems they make possible.',
			'topics'  => 'Integrated circuits · Sensors · Electronic design',
			'icon'    => '<rect x="6" y="6" width="12" height="12" rx="1"/><path d="M9 1v5m6-5v5M9 18v5m6-5v5M1 9h5m-5 6h5m12-6h5m-5 6h5"/>',
		),
		array(
			'title'   => 'Software Engineering & Computing',
			'summary' => 'Building reliable foundations for digital innovation.',
			'topics'  => 'Software systems · Computing architectures · Engineering methods',
			'icon'    => '<rect x="2" y="4" width="20" height="16" rx="1"/><path d="m8 9-3 3 3 3m8-6 3 3-3 3m-3-7-2 8"/>',
		),
		array(
			'title'   => 'Biomedical Engineering & Biology',
			'summary' => 'Engineering approaches to health and living systems.',
			'topics'  => 'Biomedical technologies · Biosignals · Biological systems',
			'icon'    => '<path d="M6 2c0 7 12 13 12 20M18 2C18 9 6 15 6 22M7 4h10M9 8h6m-6 8h6m-8 4h10"/>',
		),
		array(
			'title'   => 'Smart Cities & Sustainable Mobility',
			'summary' => 'Rethinking the systems that move and connect our cities.',
			'topics'  => 'Urban technologies · Intelligent transport · Sustainable mobility',
			'icon'    => '<path d="M2 22V8h6v14m1 0V3h7v19m1 0V11h5v11M4 12h2m-2 4h2m5-9h3m-3 5h3m-3 5h3m5-2h2M1 22h22"/>',
		),
		array(
			'title'   => 'Engineering Education & Humanitarian Technologies',
			'summary' => 'Technology that expands opportunity and serves communities.',
			'topics'  => 'Engineering learning · Inclusive design · Humanitarian applications',
			'icon'    => '<path d="M12 6C8 3 4 3 2 4v15c4-1 7 0 10 2m0-15c4-3 8-3 10-2v15c-4-1-7 0-10 2zM12 6v15"/>',
		),
	);
}

/**
 * The three conference days and their sessions.
 *
 * @return array<int, array{label: string, title: string, sessions: array<int, array{time: string, type: string, title: string, text: string}>}>
 */
function andescon_agenda(): array {
	return array(
		array(
			'label'    => 'DAY 01 / JUNE 09',
			'title'    => 'Discover',
			'sessions' => array(
				array( 'time' => '09:00', 'type' => 'WELCOME', 'title' => 'Opening & shared perspectives', 'text' => 'Welcome to the conference community.' ),
				array( 'time' => '10:00', 'type' => 'KEYNOTE', 'title' => 'Engineering across disciplines', 'text' => 'An opening conversation on research and regional impact.' ),
				array( 'time' => '14:00', 'type' => 'TECHNICAL SESSIONS', 'title' => 'Research in focus', 'text' => 'Parallel sessions across the conference tracks.' ),
				array( 'time' => '17:00', 'type' => 'COMMUNITY', 'title' => 'Meet your research community', 'text' => 'Time for conversations and new connections.' ),
			),
		),
		array(
			'label'    => 'DAY 02 / JUNE 10',
			'title'    => 'Connect',
			'sessions' => array(
				array( 'time' => '09:00', 'type' => 'KEYNOTE', 'title' => 'Intelligent and sustainable systems', 'text' => 'A cross-disciplinary research perspective.' ),
				array( 'time' => '10:30', 'type' => 'TECHNICAL SESSIONS', 'title' => 'From methods to applications', 'text' => 'Research presentations and moderated discussion.' ),
				array( 'time' => '14:00', 'type' => 'WORKSHOP', 'title' => 'Ideas into practice', 'text' => 'An illustrative space for hands-on learning.' ),
				array( 'time' => '17:00', 'type' => 'EXCHANGE', 'title' => 'Industry meets research', 'text' => 'A conversation across academic and industry perspectives.' ),
			),
		),
		array(
			'label'    => 'DAY 03 / JUNE 11',
			'title'    => 'Move forward',
			'sessions' => array(
				array( 'time' => '09:00', 'type' => 'TECHNICAL SESSIONS', 'title' => 'Emerging directions', 'text' => 'Explore new methods and open questions.' ),
				array( 'time' => '11:00', 'type' => 'PANEL', 'title' => 'Technology and its social impact', 'text' => 'A multidisciplinary conversation.' ),
				array( 'time' => '14:00', 'type' => 'COMMUNITY', 'title' => 'Next-generation engineering', 'text' => 'Student research and education perspectives.' ),
				array( 'time' => '16:00', 'type' => 'CLOSING', 'title' => 'Connections that continue', 'text' => 'Reflections and the next chapter.' ),
			),
		),
	);
}

/**
 * Submission milestones.
 *
 * @return array<int, array{label: string, value: string, text: string}>
 */
function andescon_milestones(): array {
	return array(
		array( 'label' => '01 / SUBMISSION', 'value' => 'To be announced', 'text' => 'Paper submission deadline' ),
		array( 'label' => '02 / REVIEW', 'value' => 'To be announced', 'text' => 'Acceptance notification' ),
		array( 'label' => '03 / FINAL VERSION', 'value' => 'To be announced', 'text' => 'Camera-ready submission' ),
		array( 'label' => '04 / MEET IN CALI', 'value' => 'June 9–11, 2027', 'text' => 'Conference dates*' ),
	);
}

/**
 * Registration categories.
 *
 * @return array<int, array{eyebrow: string, title: string, text: string, price: string, action: string, featured: bool}>
 */
function andescon_registration_tiers(): array {
	return array(
		array(
			'eyebrow'  => '01 / AUTHORS',
			'title'    => 'Present your work.',
			'text'     => 'For researchers sharing an accepted contribution with the conference community.',
			'price'    => 'Fees to be announced',
			'action'   => 'Author registration',
			'featured' => false,
		),
		array(
			'eyebrow'  => '02 / ATTENDEES',
			'title'    => 'Expand your perspective.',
			'text'     => 'For professionals, educators and researchers joining the conversations.',
			'price'    => 'Fees to be announced',
			'action'   => 'Attend ANDESCON',
			'featured' => true,
		),
		array(
			'eyebrow'  => '03 / STUDENTS',
			'title'    => 'Start your next chapter.',
			'text'     => 'For emerging engineers looking to learn, connect and explore new directions.',
			'price'    => 'Fees to be announced',
			'action'   => 'Student registration',
			'featured' => false,
		),
	);
}

/**
 * Organizing committees.
 *
 * @return array<int, array{title: string, text: string, note: string}>
 */
function andescon_committee(): array {
	return array(
		array( 'title' => 'General Chairs', 'text' => 'Conference leadership', 'note' => 'Names & affiliations forthcoming' ),
		array( 'title' => 'Technical Program', 'text' => 'Research and review coordination', 'note' => 'Names & affiliations forthcoming' ),
		array( 'title' => 'Local Organization', 'text' => 'Your hosts in Cali', 'note' => 'Names & affiliations forthcoming' ),
		array( 'title' => 'Track Chairs', 'text' => 'Expertise across nine fields', 'note' => 'Names & affiliations forthcoming' ),
	);
}

/**
 * Partner slots.
 *
 * @return array<int, array{label: string, note: string}>
 */
function andescon_partners(): array {
	return array(
		array( 'label' => 'HOST INSTITUTION', 'note' => 'Partner to be announced' ),
		array( 'label' => 'ACADEMIC PARTNER', 'note' => 'Partner to be announced' ),
		array( 'label' => 'INDUSTRY PARTNER', 'note' => 'Partner to be announced' ),
	);
}

/**
 * Primary navigation. Hard-coded on purpose: the layout depends on the exact
 * markup (dropdown panel, north-arrow button) and this is a one-page site.
 *
 * @return array<int, array{label: string, anchor: string, children?: array}>
 */
function andescon_navigation(): array {
	return array(
		array(
			'label'    => 'Authors',
			'children' => array(
				array( 'title' => 'Call for Papers', 'note' => 'Scope and author information', 'anchor' => 'authors' ),
				array( 'title' => 'Important dates', 'note' => 'Plan your submission', 'anchor' => 'dates' ),
				array( 'title' => 'Submit a paper', 'note' => 'Prepare your contribution', 'anchor' => 'submission' ),
			),
		),
		array( 'label' => 'Program', 'anchor' => 'program' ),
		array( 'label' => 'Committee', 'anchor' => 'committee' ),
		array( 'label' => 'Sponsors', 'anchor' => 'partners' ),
		array( 'label' => 'Venue & travel', 'anchor' => 'travel' ),
		array( 'label' => 'Contact', 'anchor' => 'contact' ),
		array( 'label' => 'Registration', 'anchor' => 'registration' ),
	);
}

/**
 * Dialog contents, keyed by dialog id.
 *
 * Bodies are trusted constants defined in this file, so they are run through
 * wp_kses_post() to keep the markup honest without losing links.
 *
 * @return array<string, array{label: string, title: string, body: string}>
 */
function andescon_dialogs(): array {
	return array(
		'submission'   => array(
			'label' => 'CONFERENCE INFORMATION',
			'title' => 'Prepare your contribution',
			'body'  => '<p>The submission portal is not connected in this design preview.</p><p>The organizing team will provide the official platform, templates and submission requirements before the call opens.</p>',
		),
		'registration' => array(
			'label' => 'CONFERENCE INFORMATION',
			'title' => 'Registration information',
			'body'  => '<p>Registration is not open in this design preview. No payments or personal information are collected.</p><p>Official fees, categories, inclusions and the registration link will be added once confirmed.</p>',
		),
		'partner'      => array(
			'label' => 'CONFERENCE INFORMATION',
			'title' => 'Become a partner',
			'body'  => '<p>Partnership packages and the sponsorship contact are pending confirmation.</p><p>This space will connect prospective academic and industry partners with the organizing team.</p>',
		),
		'contact'      => array(
			'label' => 'CONFERENCE INFORMATION',
			'title' => 'Contact the organizing team',
			'body'  => '<p>The official conference email and enquiry channels will appear here once confirmed.</p><p>For the final website, this action can open the conference mailbox or an enquiry form.</p>',
		),
		'credits'      => array(
			'label' => 'CONFERENCE INFORMATION',
			'title' => 'Image credits',
			'body'  => '<p>Conference identity and Cali illustration: supplied and developed for this design project.</p><p><a href="https://commons.wikimedia.org/wiki/File:La_Ermita,_Cali,_Colombia.jpg" target="_blank" rel="noopener">La Ermita, Cali, Colombia</a> — Juanes016, CC0.</p><p><a href="https://commons.wikimedia.org/wiki/File:Ermita_cali.jpg" target="_blank" rel="noopener">Ermita cali</a> — C arango, public domain.</p>',
		),
	);
}

/**
 * The author journey accordion.
 *
 * @return array<int, array{title: string, text: string, open: bool, dialog: string}>
 */
function andescon_author_steps(): array {
	return array(
		array(
			'title'  => 'Find your track',
			'text'   => 'Choose the research track most closely aligned with your work. Review the scope of each track before preparing your submission.',
			'open'   => true,
			'dialog' => '',
		),
		array(
			'title'  => 'Prepare your manuscript',
			'text'   => 'Official templates, manuscript length, language requirements and review policies will be added here once confirmed.',
			'open'   => false,
			'dialog' => '',
		),
		array(
			'title'  => 'Submit your contribution',
			'text'   => 'The official submission platform and deadline are to be confirmed. This prototype does not collect manuscripts.',
			'open'   => false,
			'dialog' => 'submission',
		),
		array(
			'title'  => 'Review & registration',
			'text'   => 'Notification dates, revision requirements and author registration conditions will be published by the organizing committee.',
			'open'   => false,
			'dialog' => '',
		),
	);
}

/**
 * Travel accordion.
 *
 * @return array<int, array{title: string, text: string, open: bool}>
 */
function andescon_travel_topics(): array {
	return array(
		array(
			'title' => 'Conference venue',
			'text'  => 'The host venue, address, accessibility information and on-site facilities will be confirmed here.',
			'open'  => true,
		),
		array(
			'title' => 'Getting here',
			'text'  => 'Airport connections, local transport options and suggested routes to the venue will be added to the travel guide.',
			'open'  => false,
		),
		array(
			'title' => 'Where to stay',
			'text'  => 'Recommended areas, accommodation options and any negotiated conference rates will be published once confirmed.',
			'open'  => false,
		),
	);
}
