<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Footer_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_footer';
	}

	public function get_title() {
		return esc_html__( 'Otic Footer', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-footer';
	}

	public function get_categories() {
		return [ 'otic-eye-care' ];
	}

	protected function get_available_menus() {
		$menus = wp_get_nav_menus();
		$options = [ '' => esc_html__( 'Select Menu', 'otic-eye-care' ) ];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_brand',
			[
				'label' => esc_html__( 'Brand', 'otic-eye-care' ),
			]
		);

		$this->add_control( 'logo', [ 'label' => 'Logo', 'type' => Controls_Manager::MEDIA, 'default' => [ 'url' => plugins_url( '../assets/user_logo_2.png', __FILE__ ) ] ] );
		$this->add_control( 'brand_desc', [ 'label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Providing expert, mobile ear wax removal and clinical ear care across London. Available 24/7 for your convenience.' ] );

		$repeater_social = new Repeater();
		$repeater_social->add_control( 'icon_class', [ 'label' => 'Icon Class (Phosphor)', 'type' => Controls_Manager::TEXT, 'default' => 'ph-bold ph-instagram-logo' ] );
		$repeater_social->add_control( 'link', [ 'label' => 'Link', 'type' => Controls_Manager::URL, 'default' => [ 'url' => '#' ] ] );

		$this->add_control( 'social_links', [
			'label' => 'Social Links',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater_social->get_controls(),
			'default' => [
				[ 'icon_class' => 'ph-bold ph-instagram-logo', 'link' => [ 'url' => '#' ] ],
				[ 'icon_class' => 'ph-bold ph-facebook-logo', 'link' => [ 'url' => '#' ] ],
				[ 'icon_class' => 'ph-bold ph-whatsapp-logo', 'link' => [ 'url' => '#' ] ],
			],
			'title_field' => '{{{ icon_class }}}',
		] );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_links',
			[
				'label' => esc_html__( 'Link Columns', 'otic-eye-care' ),
			]
		);

		$repeater_link = new Repeater();
		$repeater_link->add_control( 'text', [ 'label' => 'Link Text', 'type' => Controls_Manager::TEXT, 'default' => 'Link' ] );
		$repeater_link->add_control( 'url', [ 'label' => 'Link URL', 'type' => Controls_Manager::URL, 'default' => [ 'url' => '#' ] ] );

		$this->add_control(
			'columns',
			[
				'label' => esc_html__( 'Columns', 'otic-eye-care' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'title',
						'label' => 'Column Title',
						'type' => Controls_Manager::TEXT,
						'default' => 'Quick Links',
					],
					[
						'name' => 'menu_type',
						'label' => esc_html__( 'Menu Type', 'otic-eye-care' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'custom' => esc_html__( 'Custom Links', 'otic-eye-care' ),
							'dynamic' => esc_html__( 'WordPress Menu', 'otic-eye-care' ),
						],
						'default' => 'custom',
					],
					[
						'name' => 'selected_menu',
						'label' => esc_html__( 'Select Menu', 'otic-eye-care' ),
						'type' => Controls_Manager::SELECT,
						'options' => $this->get_available_menus(),
						'condition' => [
							'menu_type' => 'dynamic',
						],
					],
					[
						'name' => 'links',
						'label' => 'Links',
						'type' => Controls_Manager::REPEATER,
						'fields' => $repeater_link->get_controls(),
						'title_field' => '{{{ text }}}',
						'condition' => [
							'menu_type' => 'custom',
						],
					],
				],
				'default' => [
					[ 'title' => 'Treatments', 'links' => [
						[ 'text' => 'Ear Wax Removal', 'url' => [ 'url' => '#' ] ],
						[ 'text' => 'Ear Infections', 'url' => [ 'url' => '#' ] ],
						[ 'text' => 'Foreign Body Removal', 'url' => [ 'url' => '#' ] ],
						[ 'text' => "Children's Ear Care", 'url' => [ 'url' => '#' ] ],
					] ],
					[ 'title' => 'London Coverage', 'links' => [
						[ 'text' => 'Central London', 'url' => [ 'url' => '#' ] ],
						[ 'text' => 'North London', 'url' => [ 'url' => '#' ] ],
						[ 'text' => 'East London', 'url' => [ 'url' => '#' ] ],
						[ 'text' => 'West London', 'url' => [ 'url' => '#' ] ],
					] ],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_contact',
			[
				'label' => esc_html__( 'Contact Info', 'otic-eye-care' ),
			]
		);

		$this->add_control( 'contact_title', [ 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Contact Us' ] );

		$repeater_contact = new Repeater();
		$repeater_contact->add_control( 'icon_class', [ 'label' => 'Icon Class', 'type' => Controls_Manager::TEXT, 'default' => 'ph-bold ph-phone' ] );
		$repeater_contact->add_control( 'icon_bg', [ 'label' => 'Icon Background', 'type' => Controls_Manager::COLOR, 'default' => 'rgba(57, 134, 255, 0.1)' ] );
		$repeater_contact->add_control( 'icon_color', [ 'label' => 'Icon Color', 'type' => Controls_Manager::COLOR, 'default' => '#3986FF' ] );
		$repeater_contact->add_control( 'label', [ 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => 'Label' ] );
		$repeater_contact->add_control( 'value', [ 'label' => 'Value', 'type' => Controls_Manager::TEXT, 'default' => 'Value' ] );

		$this->add_control( 'contact_items', [
			'label' => 'Contact Items',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater_contact->get_controls(),
			'default' => [
				[ 'icon_class' => 'ph-bold ph-phone', 'icon_bg' => 'rgba(57, 134, 255, 0.1)', 'icon_color' => '#3986FF', 'label' => '24/7 Hotline', 'value' => '+44 7852 992 668' ],
				[ 'icon_class' => 'ph-bold ph-envelope', 'icon_bg' => 'rgba(139, 224, 158, 0.1)', 'icon_color' => '#8BE09E', 'label' => 'Email Support', 'value' => 'info@oticearcare.co.uk' ],
				[ 'icon_class' => 'ph-bold ph-clock', 'icon_bg' => 'rgba(251, 191, 36, 0.1)', 'icon_color' => '#FBBF24', 'label' => 'Clinic Hours', 'value' => '24/7 Availability' ],
			],
			'title_field' => '{{{ label }}}',
		] );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_bottom',
			[
				'label' => esc_html__( 'Footer Bottom', 'otic-eye-care' ),
			]
		);

		$this->add_control( 'copyright', [ 'label' => 'Copyright Text', 'type' => Controls_Manager::TEXT, 'default' => '© ' . date('Y') . ' Otic Ear Care. All rights reserved.' ] );

		$repeater_legal = new Repeater();
		$repeater_legal->add_control( 'text', [ 'label' => 'Link Text', 'type' => Controls_Manager::TEXT, 'default' => 'Link' ] );
		$repeater_legal->add_control( 'link', [ 'label' => 'Link URL', 'type' => Controls_Manager::URL, 'default' => [ 'url' => '#' ] ] );

		$this->add_control( 'legal_links', [
			'label' => 'Legal Links',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater_legal->get_controls(),
			'default' => [
				[ 'text' => 'Privacy Policy', 'link' => [ 'url' => '#' ] ],
				[ 'text' => 'Terms of Service', 'link' => [ 'url' => '#' ] ],
			],
			'title_field' => '{{{ text }}}',
		] );

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<footer class="otic-footer">
			<div class="container">
				<div class="otic-footer-grid">
					
					<!-- Brand Column -->
					<div class="otic-footer-col otic-footer-brand">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="otic-footer-logo-link">
							<img src="<?php echo esc_url( $settings['logo']['url'] ); ?>" alt="Otic Ear Care" class="otic-footer-logo">
						</a>
						<p class="otic-footer-desc">
							<?php echo esc_html( $settings['brand_desc'] ); ?>
						</p>
						<div class="otic-footer-socials">
							<?php foreach ( $settings['social_links'] as $social ) : ?>
								<a href="<?php echo esc_url( $social['link']['url'] ); ?>" class="otic-footer-social-icon">
									<i class="<?php echo esc_attr( $social['icon_class'] ); ?>"></i>
								</a>
							<?php endforeach; ?>
						</div>
					</div>

					<!-- Dynamic Columns -->
					<?php foreach ( $settings['columns'] as $col ) : 
						$links = [];
						if ( 'dynamic' === $col['menu_type'] && ! empty( $col['selected_menu'] ) ) {
							$menu_items = wp_get_nav_menu_items( $col['selected_menu'] );
							if ( $menu_items ) {
								foreach ( $menu_items as $item ) {
									$links[] = [
										'text' => $item->title,
										'url'  => [ 'url' => $item->url ],
									];
								}
							}
						} else {
							$links = !empty($col['links']) ? $col['links'] : [];
						}
					?>
						<div class="otic-footer-col otic-footer-nav">
							<h4 class="otic-footer-title"><?php echo esc_html( $col['title'] ); ?></h4>
							<ul class="otic-footer-list">
								<?php foreach ( $links as $link ) : ?>
									<li><a href="<?php echo esc_url( $link['url']['url'] ); ?>" class="otic-footer-link"><?php echo esc_html( $link['text'] ); ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endforeach; ?>

					<!-- Contact Column -->
					<div class="otic-footer-col otic-footer-contact">
						<h4 class="otic-footer-title"><?php echo esc_html( $settings['contact_title'] ); ?></h4>
						<div class="otic-footer-contact-list">
							<?php foreach ( $settings['contact_items'] as $item ) : ?>
								<div class="otic-footer-contact-item">
									<div class="otic-footer-contact-icon-box" style="background: <?php echo esc_attr( $item['icon_bg'] ); ?>; color: <?php echo esc_attr( $item['icon_color'] ); ?>;">
										<i class="<?php echo esc_attr( $item['icon_class'] ); ?>"></i>
									</div>
									<div>
										<p class="otic-footer-contact-label"><?php echo esc_html( $item['label'] ); ?></p>
										<p class="otic-footer-contact-value"><?php echo esc_html( $item['value'] ); ?></p>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>

				<div class="otic-footer-bottom">
					<p><?php echo esc_html( $settings['copyright'] ); ?></p>
					<div class="otic-footer-legal-links">
						<?php foreach ( $settings['legal_links'] as $legal ) : ?>
							<a href="<?php echo esc_url( $legal['link']['url'] ); ?>" class="otic-footer-legal-link"><?php echo esc_html( $legal['text'] ); ?></a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</footer>
		<?php
	}
}
