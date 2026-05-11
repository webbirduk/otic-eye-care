<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Header_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_header';
	}

	public function get_title() {
		return esc_html__( 'Otic Header', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-header';
	}

	public function get_categories() {
		return [ 'otic-eye-care' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'logo_white',
			[
				'label' => esc_html__( 'White Logo', 'otic-eye-care' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => plugins_url( '../assets/white-logo.png', __FILE__ ),
				],
			]
		);

		$this->add_control(
			'logo_dark',
			[
				'label' => esc_html__( 'Dark Logo', 'otic-eye-care' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => plugins_url( '../assets/user_logo_2.png', __FILE__ ),
				],
			]
		);

		$this->add_control(
			'menu_type',
			[
				'label' => esc_html__( 'Menu Type', 'otic-eye-care' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'custom' => esc_html__( 'Custom Repeater', 'otic-eye-care' ),
					'dynamic' => esc_html__( 'WordPress Menu', 'otic-eye-care' ),
				],
				'default' => 'custom',
			]
		);

		$menus = wp_get_nav_menus();
		$menu_options = [ '' => esc_html__( 'Select Menu', 'otic-eye-care' ) ];
		foreach ( $menus as $menu ) {
			$menu_options[ $menu->slug ] = $menu->name;
		}

		$this->add_control(
			'selected_menu',
			[
				'label' => esc_html__( 'Select Menu', 'otic-eye-care' ),
				'type' => Controls_Manager::SELECT,
				'options' => $menu_options,
				'condition' => [
					'menu_type' => 'dynamic',
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_text',
			[
				'label' => esc_html__( 'Text', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Menu Item', 'otic-eye-care' ),
			]
		);

		$repeater->add_control(
			'item_link',
			[
				'label' => esc_html__( 'Link', 'otic-eye-care' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'otic-eye-care' ),
			]
		);

		$repeater->add_control(
			'has_dropdown',
			[
				'label' => esc_html__( 'Has Dropdown?', 'otic-eye-care' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'otic-eye-care' ),
				'label_off' => esc_html__( 'No', 'otic-eye-care' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$repeater->add_control(
			'dropdown_items',
			[
				'label' => esc_html__( 'Dropdown Items', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'description' => esc_html__( 'One item per line. Format: Text|Link', 'otic-eye-care' ),
				'condition' => [
					'has_dropdown' => 'yes',
				],
			]
		);

		$this->add_control(
			'menu_items',
			[
				'label' => esc_html__( 'Menu Items', 'otic-eye-care' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'item_text' => esc_html__( 'Ear Wax Removal', 'otic-eye-care' ),
						'item_link' => [ 'url' => '#' ],
					],
					[
						'item_text' => esc_html__( 'Ear Treatments', 'otic-eye-care' ),
						'item_link' => [ 'url' => '#' ],
						'has_dropdown' => 'yes',
						'dropdown_items' => "Ear Infection Treatment|#\nForeign Body Removal|#\nChildren’s Ear Wax Removal|#",
					],
					[
						'item_text' => esc_html__( 'Fees', 'otic-eye-care' ),
						'item_link' => [ 'url' => '#' ],
					],
					[
						'item_text' => esc_html__( 'Insights & Advice', 'otic-eye-care' ),
						'item_link' => [ 'url' => '#' ],
					],
				],
				'title_field' => '{{{ item_text }}}',
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label' => esc_html__( 'CTA Text', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Book Appointment', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'cta_link',
			[
				'label' => esc_html__( 'CTA Link', 'otic-eye-care' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'otic-eye-care' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$menu_items = [];

		if ( 'dynamic' === $settings['menu_type'] && ! empty( $settings['selected_menu'] ) ) {
			$wp_menu_items = wp_get_nav_menu_items( $settings['selected_menu'] );
			if ( $wp_menu_items ) {
				foreach ( $wp_menu_items as $menu_item ) {
					if ( $menu_item->menu_item_parent == 0 ) {
						$child_items = [];
						foreach ( $wp_menu_items as $child ) {
							if ( $child->menu_item_parent == $menu_item->ID ) {
								$child_items[] = [
									'text' => $child->title,
									'link' => $child->url,
								];
							}
						}
						$menu_items[] = [
							'text' => $menu_item->title,
							'link' => $menu_item->url,
							'has_dropdown' => ! empty( $child_items ),
							'dropdown_items' => $child_items,
						];
					}
				}
			}
		} else {
			foreach ( $settings['menu_items'] as $item ) {
				$dropdown_items = [];
				if ( 'yes' === $item['has_dropdown'] ) {
					$lines = explode( "\n", str_replace( "\r", "", $item['dropdown_items'] ) );
					foreach ( $lines as $line ) {
						$parts = explode( "|", $line );
						if ( ! empty( $parts[0] ) ) {
							$dropdown_items[] = [
								'text' => $parts[0],
								'link' => $parts[1] ?? '#',
							];
						}
					}
				}
				$menu_items[] = [
					'text' => $item['item_text'],
					'link' => $item['item_link']['url'],
					'has_dropdown' => 'yes' === $item['has_dropdown'],
					'dropdown_items' => $dropdown_items,
				];
			}
		}
		?>
		<header class="navbar" id="navbar">
			<div class="container nav-container" style="display: flex; align-items: center; justify-content: space-between;">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" style="display: flex; align-items: center;">
					<img src="<?php echo esc_url( $settings['logo_white']['url'] ); ?>" alt="Otic Ear Care" class="logo-white" style="height: 55px; width: auto;">
					<img src="<?php echo esc_url( $settings['logo_dark']['url'] ); ?>" alt="Otic Ear Care" class="logo-dark" style="height: 55px; width: auto;">
				</a>
				
				<nav class="nav-links" style="display: flex; align-items: center; gap: 2.5rem; margin: 0 auto; padding: 0 1rem;">
					<?php foreach ( $menu_items as $item ) : ?>
						<?php if ( $item['has_dropdown'] ) : ?>
							<div class="dropdown">
								<button class="dropbtn" style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600; color: inherit; background: none; border: none; cursor: pointer; padding: 0.5rem 0;">
									<?php echo esc_html( $item['text'] ); ?> <i class="ph ph-caret-down" style="font-size: 0.8rem;"></i>
								</button>
								<div class="dropdown-content">
									<?php foreach ( $item['dropdown_items'] as $child ) : ?>
										<a href="<?php echo esc_url( $child['link'] ); ?>"><?php echo esc_html( $child['text'] ); ?></a>
									<?php endforeach; ?>
								</div>
							</div>
						<?php else : ?>
							<a href="<?php echo esc_url( $item['link'] ); ?>" style="font-weight: 600; text-decoration: none; color: inherit; padding: 0.5rem 0;"><?php echo esc_html( $item['text'] ); ?></a>
						<?php endif; ?>
					<?php endforeach; ?>
				</nav>

				<div class="nav-right" style="display: flex; align-items: center; gap: 1.5rem;">
					<a href="<?php echo esc_url( $settings['cta_link']['url'] ); ?>" class="btn btn-primary nav-cta" style="padding: 0.8rem 1.8rem; border-radius: 100px; font-weight: 700;">
						<?php echo esc_html( $settings['cta_text'] ); ?> <i class="ph-bold ph-arrow-right"></i>
					</a>
					<button class="menu-toggle" id="mobile-menu-btn" style="background: none; border: none; font-size: 2rem; cursor: pointer;"><i class="ph ph-list"></i></button>
				</div>
			</div>

			<div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>
			<div class="mobile-nav" id="mobile-nav">
				<div class="mobile-nav-header">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-logo">
						<img src="<?php echo esc_url( $settings['logo_dark']['url'] ); ?>" alt="Otic Ear Care" style="height: 70px;">
					</a>
					<button class="close-menu" id="close-menu-btn"><i class="ph ph-x"></i></button>
				</div>
				<div class="mobile-nav-content">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-nav-link">
						<i class="ph ph-house"></i>
						<span>Home</span>
						<i class="ph ph-caret-right chevron-right"></i>
					</a>
					<?php foreach ( $menu_items as $item ) : ?>
						<?php if ( $item['has_dropdown'] ) : ?>
							<div class="mobile-nav-dropdown">
								<button class="mobile-nav-link dropdown-toggle" style="width: 100%; text-align: left; background: none; border: none; border-bottom: 1px solid rgba(0,0,0,0.02);">
									<i class="ph ph-plus-circle"></i>
									<span><?php echo esc_html( $item['text'] ); ?></span>
									<i class="ph ph-caret-down chevron-down"></i>
								</button>
								<div class="mobile-dropdown-content">
									<?php foreach ( $item['dropdown_items'] as $child ) : ?>
										<a href="<?php echo esc_url( $child['link'] ); ?>"><?php echo esc_html( $child['text'] ); ?></a>
									<?php endforeach; ?>
								</div>
							</div>
						<?php else : ?>
							<a href="<?php echo esc_url( $item['link'] ); ?>" class="mobile-nav-link">
								<i class="ph ph-caret-right"></i>
								<span><?php echo esc_html( $item['text'] ); ?></span>
								<i class="ph ph-caret-right chevron-right"></i>
							</a>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<div class="mobile-nav-footer">
					<div class="mobile-contact-box">
						<div class="contact-icon"><i class="ph ph-phone"></i></div>
						<div class="contact-info">
							<span>24/7 DIRECT LINE</span>
							<strong>+44 7852 992 668</strong>
						</div>
					</div>
					<a href="<?php echo esc_url( $settings['cta_link']['url'] ); ?>" class="btn btn-primary mobile-cta">
						<span><?php echo esc_html( $settings['cta_text'] ); ?></span>
						<i class="ph ph-calendar-blank"></i>
					</a>
				</div>
			</div>
		</header>
		<?php
	}
}
