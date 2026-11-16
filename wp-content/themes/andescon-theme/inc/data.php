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
 * Photos for the home-page track mosaic, in the same order as
 * andescon_tracks(). Wikimedia Commons images; credits are shown under
 * the mosaic as the licenses require.
 *
 * @return array<int, array{image: string, alt: string, author: string, license: string, source: string}>
 */
function andescon_track_photos(): array {
	return array(
		array( 'image' => 'img/tracks/data.webp', 'alt' => 'Rows of server racks in a data center', 'author' => 'PiDatacenters', 'license' => 'CC BY-SA 4.0', 'source' => 'https://commons.wikimedia.org/wiki/File:Racks_Amravati_Data_Center.jpg' ),
		array( 'image' => 'img/tracks/energy.webp', 'alt' => 'High-voltage transmission tower against a blue sky', 'author' => 'Judgefloro', 'license' => 'CC BY-SA 3.0', 'source' => 'https://commons.wikimedia.org/wiki/File:FvfCoralnaBatoSRc0731_12.JPG' ),
		array( 'image' => 'img/tracks/robotics.webp', 'alt' => 'Collaborative robot arm on a workbench with its control tablet', 'author' => 'Auledas', 'license' => 'CC BY-SA 4.0', 'source' => 'https://commons.wikimedia.org/wiki/File:UR16e_robot_arm.png' ),
		array( 'image' => 'img/tracks/telecom.webp', 'alt' => 'Telecommunication tower with antennas and dishes', 'author' => 'Jana Plavec', 'license' => 'CC BY-SA 4.0', 'source' => 'https://commons.wikimedia.org/wiki/File:Telecommunication_tower_on_Mile%C5%A1ovka_2021-11-06_01.jpg' ),
		array( 'image' => 'img/tracks/circuits.webp', 'alt' => 'Close-up of green circuit board traces', 'author' => 'Peter Shanks', 'license' => 'CC BY 2.0', 'source' => 'https://commons.wikimedia.org/wiki/File:Green_circuit_board_II_(2389301870).jpg' ),
		array( 'image' => 'img/tracks/software.webp', 'alt' => 'Colourful source code on a screen', 'author' => 'Martin Vorel', 'license' => 'CC BY-SA 4.0', 'source' => 'https://commons.wikimedia.org/wiki/File:Programming_code.jpg' ),
		array( 'image' => 'img/tracks/biomedical.webp', 'alt' => 'MRI scanner in a hospital room', 'author' => 'Jan Ainali', 'license' => 'CC BY 3.0', 'source' => 'https://commons.wikimedia.org/wiki/File:MRI-Philips.JPG' ),
		array( 'image' => 'img/tracks/mobility.webp', 'alt' => 'Electric city bus charging at a pantograph station', 'author' => 'Maksym Kozlenko', 'license' => 'CC BY 4.0', 'source' => 'https://commons.wikimedia.org/wiki/File:2024-0%3D424_Electric_bus_charging_in_Warsaw.jpg' ),
		array( 'image' => 'img/tracks/education.webp', 'alt' => 'Student driving a competition robot with a game controller', 'author' => 'Noah Wulf', 'license' => 'CC BY-SA 4.0', 'source' => 'https://commons.wikimedia.org/wiki/File:VEX_Robotics_Competition_Robot_and_Controller.jpg' ),
	);
}

/**
 * Submission milestones.
 *
 * @return array<int, array{label: string, title: string, text: string, date: string, short: string}>
 */
function andescon_milestones(): array {
	return array(
		array( 'label' => '01 · SUBMISSION', 'title' => 'Full paper submission', 'text' => 'Deadline for full papers in all nine research tracks.', 'date' => '2027-02-16', 'short' => 'FEB 16, 2027' ),
		array( 'label' => '02 · REVIEW', 'title' => 'Notification of acceptance', 'text' => 'Authors receive the review results.', 'date' => '2027-03-30', 'short' => 'MAR 30, 2027' ),
		array( 'label' => '03 · FINAL VERSION', 'title' => 'Final paper submission', 'text' => 'Camera-ready version of accepted papers.', 'date' => '2027-04-30', 'short' => 'APR 30, 2027' ),
		array( 'label' => '04 · CONFERENCE', 'title' => 'ANDESCON 2027 in Cali', 'text' => 'Three days of keynotes, technical sessions and workshops.', 'date' => '2027-06-09', 'short' => 'JUN 9–11, 2027' ),
	);
}

/**
 * Organizer and contact details, shown in the contact section.
 *
 * @return array{name: string, email: string, facebook: string, logo: string}
 */
function andescon_organizer(): array {
	return array(
		'name'  => 'IEEE Andean Council (Consejo Andino)',
		'email' => 'consejoandino@gmail.com',
		'facebook' => 'https://www.facebook.com/IEEEandescon/',
		'logo'  => 'img/logos/logo-andino-blanco-1024x264-1.webp',
	);
}

/**
 * Footer logo groups ("Hosted by", "Organized by"). Logos are light
 * artwork on transparent backgrounds, sized for the dark footer.
 *
 * @return array<int, array{label: string, logos: array<int, array{name: string, image: string, width: int, height: int}>}>
 */
function andescon_footer_logos(): array {
	return array(
		array(
			'label' => __( 'HOSTED BY', 'andescon-theme' ),
			'logos' => array(
				array( 'name' => 'Universidad Icesi', 'image' => 'img/logos/icesi.webp', 'width' => 640, 'height' => 237 ),
			),
		),
		array(
			'label' => __( 'ORGANIZED BY', 'andescon-theme' ),
			'logos' => array(
				array( 'name' => 'IEEE Andean Council (Consejo Andino)', 'image' => 'img/logos/logo-andino-blanco-1024x264-1.webp', 'width' => 1024, 'height' => 264 ),
				array( 'name' => 'IEEE Region 9', 'image' => 'img/logos/ieee-region9.webp', 'width' => 640, 'height' => 317 ),
				array( 'name' => 'IEEE Colombia Section', 'image' => 'img/logos/ieee-colombia.webp', 'width' => 640, 'height' => 212 ),
			),
		),
	);
}

/**
 * The conference as a calendar event: drives the countdown and the
 * "Add to calendar" links. All-day event; `end` is exclusive (iCal rule).
 *
 * @return array{title: string, start: string, end: string, starts_at: string, location: string, details: string}
 */
function andescon_event(): array {
	return array(
		'title'     => 'IEEE ANDESCON 2027',
		'start'     => '2027-06-09',
		'end'       => '2027-06-12',
		'starts_at' => '2027-06-09T00:00:00-05:00', // Midnight in Cali (UTC-5).
		'location'  => 'Santiago de Cali, Colombia',
		'details'   => 'IEEE ANDESCON 2027 — Technology and innovation for Andean industry. June 9–11, 2027, Cali, Colombia.',
	);
}

/**
 * Registration categories.
 *
 * @return array<int, array{title: string, text: string, price: string, action: string, featured: bool}>
 */
function andescon_registration_tiers(): array {
	return array(
		array(
			'title'    => 'Authors',
			'text'     => 'For researchers sharing an accepted contribution with the conference community.',
			'price'    => 'Fees to be announced',
			'action'   => 'Author registration',
			'featured' => false,
		),
		array(
			'title'    => 'Attendees',
			'text'     => 'For professionals, educators and researchers joining the conversations.',
			'price'    => 'Fees to be announced',
			'action'   => 'Attend ANDESCON',
			'featured' => true,
		),
		array(
			'title'    => 'Students',
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
 * @return array<int, array{title: string, text: string}>
 */
function andescon_committee(): array {
	return array(
		array( 'title' => 'General Chairs', 'text' => 'Conference leadership' ),
		array( 'title' => 'Technical Program', 'text' => 'Research and review coordination' ),
		array( 'title' => 'Local Organization', 'text' => 'Your hosts in Cali' ),
		array( 'title' => 'Track Chairs', 'text' => 'Expertise across nine fields' ),
	);
}

/**
 * Conference venue. Change these values if the venue moves; the map and
 * links in the travel section follow automatically.
 *
 * @return array{name: string, address: string, query: string}
 */
function andescon_venue(): array {
	return array(
		'name'    => 'Universidad Icesi',
		'address' => 'Calle 18 No. 122-135, Pance, Cali, Colombia',
		'query'   => 'Universidad Icesi, Cali, Colombia',
	);
}

/**
 * Discover Cali: places to visit and typical food for the Attend page.
 *
 * Wikimedia Commons photos carry `author`, `license` and `source`, shown on
 * the card as attribution. Leave `author` empty when no credit is needed.
 *
 * @return array<string, array{title: string, items: array<int, array<string, string>>}>
 */
function andescon_discover(): array {
	$c = 'https://commons.wikimedia.org/wiki/File:';

	return array(
		'places' => array(
			'title' => 'Places to visit',
			'items' => array(
				array( 'title' => 'Cristo Rey', 'text' => 'A 26-metre statue watching over the city from the western hills.', 'image' => 'img/discover/cristo-rey.webp', 'alt' => 'The Cristo Rey statue against the sky', 'author' => '', 'license' => '', 'source' => '' ),
				array( 'title' => 'Barrio San Antonio', 'text' => 'Colonial streets, cafés and the best sunset view of Cali.', 'image' => 'img/discover/san-antonio.webp', 'alt' => 'A sloping street of colonial houses in San Antonio', 'author' => 'ProtoplasmaKid', 'license' => 'CC BY 4.0', 'source' => $c . 'Barrio_San_Antonio,_Cali_02.jpg' ),
				array( 'title' => 'Salsa capital', 'text' => 'Dance the night away in the world capital of salsa.', 'image' => 'img/discover/salsa.webp', 'alt' => 'A couple dancing salsa on stage', 'author' => 'Hilcias Salazar', 'license' => 'CC BY 2.0', 'source' => $c . 'Salsa_en_Cali.jpg' ),
				array( 'title' => 'Cerro de las Tres Cruces', 'text' => 'A popular morning hike with views over the whole valley.', 'image' => 'img/discover/tres-cruces.webp', 'alt' => 'Hikers at the crosses on top of the Tres Cruces hill', 'author' => '', 'license' => '', 'source' => '' ),
				array( 'title' => 'El Gato del Río', 'text' => 'Hernando Tejada\'s bronze cat and its "girlfriends" along the Cali river.', 'image' => 'img/discover/gato-rio.webp', 'alt' => 'The Gato del Río sculpture by the river', 'author' => 'Juan Espinosa', 'license' => 'CC BY-SA 2.0', 'source' => $c . 'El_Gato_del_R%C3%ADo-Cali.jpg' ),
				array( 'title' => 'Bulevar del Río', 'text' => 'A walkable riverside promenade in the historic centre.', 'image' => 'img/discover/bulevar-rio.webp', 'alt' => 'The Bulevar del Río promenade in downtown Cali at night', 'author' => '', 'license' => '', 'source' => '' ),
			),
		),
		'food'   => array(
			'title' => 'A taste of Cali',
			'items' => array(
				array( 'title' => 'Pandebono', 'text' => 'Warm cheese bread made with cassava starch. Breakfast in Valle del Cauca.', 'image' => 'img/discover/pandebono.webp', 'alt' => 'Freshly baked pandebono', 'author' => '', 'license' => '', 'source' => '' ),
				array( 'title' => 'Cholado', 'text' => 'Shaved ice, tropical fruit, condensed milk and syrup, sold from street carts.', 'image' => 'img/discover/cholado.webp', 'alt' => 'A cholado with fruit, syrup and wafers', 'author' => '', 'license' => '', 'source' => '' ),
				array( 'title' => 'Lulada', 'text' => 'Refreshing drink of crushed lulo, lime and ice.', 'image' => 'img/discover/lulada.webp', 'alt' => 'A glass of lulada with crushed lulo', 'author' => '', 'license' => '', 'source' => '' ),
				array( 'title' => 'Champús', 'text' => 'A traditional corn, pineapple and lulo drink spiced with cinnamon and clove.', 'image' => 'img/discover/champus.webp', 'alt' => 'A glass of champús', 'author' => '', 'license' => '', 'source' => '' ),
				array( 'title' => 'Chontaduro', 'text' => 'Peach-palm fruit from the Pacific, eaten with salt and honey.', 'image' => 'img/discover/chontaduro.webp', 'alt' => 'Red and orange chontaduro fruit', 'author' => '', 'license' => '', 'source' => '' ),
			),
		),
	);
}

/**
 * Primary navigation. Hard-coded on purpose: the layout depends on the exact
 * markup (mega-menu panels).
 *
 * Targets use andescon_url() syntax: "page#anchor". Heavy content lives on
 * inner pages (see andescon_pages()) so the front page stays light.
 *
 * An item with `mega` opens a full-width panel: a dark column of `links`
 * plus a `cta` on the left, and `cards` on the right. A card shows either an
 * `image` (path under assets/) or a Font Awesome `icon`.
 *
 * @return array<int, array{label: string, url: string, mega?: array}>
 */
function andescon_navigation(): array {
	return array(
		array( 'label' => 'Home', 'url' => '/' ),
		array(
			'label' => 'Authors',
			'url'   => 'authors',
			'mega'  => array(
				'heading' => 'Call for papers',
				'links'   => array(
					array( 'title' => 'Call for Papers', 'url' => 'authors#authors' ),
					array( 'title' => 'Research tracks', 'url' => 'authors#tracks' ),
					array( 'title' => 'Important dates', 'url' => 'authors#dates' ),
					array( 'title' => 'Submission guidelines', 'url' => 'authors#submission' ),
					array( 'title' => 'Paper templates', 'url' => 'authors#templates' ),
				),
				'cta'     => array( 'label' => 'Submit a paper', 'url' => 'authors#submission' ),
				'cards'   => array(
					array( 'title' => 'Research tracks', 'text' => 'Nine fields, from intelligent systems to humanitarian technology.', 'url' => 'authors#tracks', 'icon' => 'fa-solid fa-layer-group' ),
					array( 'title' => 'Important dates', 'text' => 'Full papers are due February 16, 2027.', 'url' => 'authors#dates', 'icon' => 'fa-regular fa-calendar-check' ),
					array( 'title' => 'Submit a paper', 'text' => 'Prepare your contribution.', 'url' => 'authors#submission', 'icon' => 'fa-solid fa-file-arrow-up' ),
				),
			),
		),
		array( 'label' => 'Program', 'url' => 'program' ),
		array(
			'label' => 'Attend',
			'url'   => 'attend',
			'mega'  => array(
				'heading' => 'Join us in Cali',
				'links'   => array(
					array( 'title' => 'Registration', 'url' => 'attend#registration' ),
					array( 'title' => 'Venue & travel', 'url' => 'attend#travel' ),
					array( 'title' => 'Discover Cali', 'url' => 'attend#discover' ),
				),
				'cta'     => array( 'label' => 'Registration', 'url' => 'attend#registration' ),
				'cards'   => array(
					array( 'title' => 'This is Cali', 'text' => 'Discover the architecture, culture and energy of Cali.', 'url' => '#city', 'image' => 'img/cali.webp' ),
					array( 'title' => 'Registration', 'text' => 'Fees for authors, attendees and students.', 'url' => 'attend#registration', 'icon' => 'fa-solid fa-id-badge' ),
					array( 'title' => 'Venue & travel', 'text' => 'Getting here and where to stay.', 'url' => 'attend#travel', 'icon' => 'fa-solid fa-plane-arrival' ),
				),
			),
		),
		array( 'label' => 'Committee', 'url' => 'committee' ),
	);
}

/**
 * Inner pages, keyed by slug. page.php renders the matching template parts
 * under a page header; the pages themselves are created by
 * andescon_ensure_pages().
 *
 * @return array<string, array{title: string, intro: string, parts: string[]}>
 */
function andescon_pages(): array {
	return array(
		'authors'   => array(
			'title' => 'Authors',
			'intro' => 'Research tracks, submission guidelines and important dates for ANDESCON 2027 authors.',
			'parts' => array( 'authors', 'tracks' ),
		),
		'program'   => array(
			'title' => 'Program',
			'intro' => 'Three days of keynotes, technical sessions and workshops in Cali, June 9–11, 2027.',
			'parts' => array( 'program' ),
		),
		'attend'    => array(
			'title' => 'Attend',
			'intro' => 'Registration, venue and practical information for your trip to Cali.',
			'parts' => array( 'registration', 'travel', 'discover' ),
		),
		'committee' => array(
			'title' => 'Organizing committee',
			'intro' => 'The people behind ANDESCON 2027.',
			'parts' => array( 'committee' ),
		),
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
			'text'   => 'Use the official ANDESCON 2027 paper templates (Word, LaTeX or Overleaf). Manuscript length, language requirements and review policies will be added here once confirmed.',
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
 * Paper templates for authors (Authors page, #templates).
 *
 * To publish a template, drop the file into assets/templates/ with the exact
 * name given in `file`: the card switches from "Coming soon" to a download
 * link on its own. For Overleaf, paste the template link into `url`.
 *
 * @return array<int, array{title: string, format: string, icon: string, file?: string, url?: string}>
 */
function andescon_paper_templates(): array {
	return array(
		array( 'title' => 'Word template', 'format' => '.docx', 'icon' => 'fa-solid fa-file-word', 'file' => 'templates/andescon-2027-template.docx' ),
		array( 'title' => 'LaTeX template', 'format' => '.zip', 'icon' => 'fa-solid fa-file-code', 'file' => 'templates/andescon-2027-latex.zip' ),
		array( 'title' => 'Overleaf template', 'format' => 'Online', 'icon' => 'fa-solid fa-leaf', 'url' => '' ),
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
			'text'  => 'ANDESCON 2027 will be hosted at Universidad Icesi, in the south of Cali. Accessibility information and on-site facilities will be confirmed here.',
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
