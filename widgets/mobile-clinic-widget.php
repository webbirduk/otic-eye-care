<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Mobile_Clinic_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_mobile_clinic';
	}

	public function get_title() {
		return esc_html__( 'Otic Mobile Clinic', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return [ 'otic-eye-care' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_header',
			[
				'label' => esc_html__( 'Header', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'badge_text',
			[
				'label' => esc_html__( 'Badge Text', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Mobile Clinic Service', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Expert Ear Care [Right at Your Doorstep]', 'otic-eye-care' ),
				'description' => esc_html__( 'Wrap the gradient part in brackets like [Right at Your Doorstep]', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Bringing expert mobile ear care to the comfort and privacy of your own home, 24/7 across London.', 'otic-eye-care' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_cards',
			[
				'label' => esc_html__( 'Service Cards', 'otic-eye-care' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'card_image',
			[
				'label' => esc_html__( 'Image', 'otic-eye-care' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'card_tag',
			[
				'label' => esc_html__( 'Tag', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Service', 'otic-eye-care' ),
			]
		);

		$repeater->add_control(
			'card_title',
			[
				'label' => esc_html__( 'Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Ear Wax Removal', 'otic-eye-care' ),
			]
		);

		$repeater->add_control(
			'card_description',
			[
				'label' => esc_html__( 'Description', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Specialist mobile micro-suction ear cleaning across London. The safest, most effective method for clear hearing.', 'otic-eye-care' ),
			]
		);

		$repeater->add_control(
			'card_link_text',
			[
				'label' => esc_html__( 'Link Text', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Explore Treatment', 'otic-eye-care' ),
			]
		);

		$repeater->add_control(
			'card_link',
			[
				'label' => esc_html__( 'Link', 'otic-eye-care' ),
				'type' => Controls_Manager::URL,
				'default' => [ 'url' => '#' ],
			]
		);

		$repeater->add_control(
			'card_theme',
			[
				'label' => esc_html__( 'Theme', 'otic-eye-care' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'blue' => esc_html__( 'Blue', 'otic-eye-care' ),
					'coral' => esc_html__( 'Coral', 'otic-eye-care' ),
					'teal' => esc_html__( 'Teal', 'otic-eye-care' ),
				],
				'default' => 'blue',
			]
		);

		$this->add_control(
			'service_cards',
			[
				'label' => esc_html__( 'Cards', 'otic-eye-care' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'card_title' => esc_html__( 'Ear Wax Removal', 'otic-eye-care' ),
						'card_theme' => 'blue',
						'card_tag' => 'Most Popular',
						'card_image' => [ 'url' => plugins_url( '../assets/microsuction.png', __FILE__ ) ],
					],
					[
						'card_title' => esc_html__( 'Ear Infection Treatment', 'otic-eye-care' ),
						'card_theme' => 'coral',
						'card_tag' => 'Urgent Care',
						'card_image' => [ 'url' => plugins_url( '../assets/ear_treatment.png', __FILE__ ) ],
					],
					[
						'card_title' => esc_html__( 'Foreign Body Removal', 'otic-eye-care' ),
						'card_theme' => 'teal',
						'card_tag' => 'NHS Experienced',
						'card_image' => [ 'url' => plugins_url( '../assets/professional_ear_wax_removal_procedure_1776407982983.png', __FILE__ ) ],
					],
				],
				'title_field' => '{{{ card_title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['title'] );
		?>
		<section class="clinic-services" style="padding: 100px 0; background: #ffffff; position: relative; overflow: hidden;">
			<div style="position: absolute; top: -10%; right: -5%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(74, 144, 226, 0.08) 0%, transparent 70%); z-index: 1;"></div>
			<div style="position: absolute; bottom: -10%; left: -5%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(224, 159, 156, 0.1) 0%, transparent 70%); z-index: 1;"></div>

			<div class="container" style="position: relative; z-index: 2;">
				<div style="text-align: center; max-width: 800px; margin: 0 auto 60px auto;">
					<div style="color: var(--primary); font-weight: 800; letter-spacing: 3px; text-transform: uppercase; font-size: 0.85rem; margin-bottom: 1.5rem; background: rgba(74, 144, 226, 0.1); display: inline-block; padding: 0.5rem 1.5rem; border-radius: 99px;">
						<?php echo esc_html( $settings['badge_text'] ); ?>
					</div>
					<h2 class="section-title" style="font-size: 3.5rem; line-height: 1.1; margin-bottom: 2rem; letter-spacing: -0.02em;">
						<?php echo wp_kses_post( $title ); ?>
					</h2>
					<p style="font-size: 1.25rem; line-height: 1.7; color: var(--text-muted); max-width: 700px; margin: 0 auto;">
						<?php echo esc_html( $settings['description'] ); ?>
					</p>
				</div>

				<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3rem;">
					<?php foreach ( $settings['service_cards'] as $card ) : ?>
						<div class="service-feature-card card-<?php echo esc_attr( $card['card_theme'] ); ?>">
							<div class="card-image-section">
								<img src="<?php echo esc_url( $card['card_image']['url'] ); ?>" alt="<?php echo esc_attr( $card['card_title'] ); ?>">
								<div class="gloss-overlay"></div>
								<div class="service-tag"><?php echo esc_html( $card['card_tag'] ); ?></div>
							</div>
							<div class="card-body">
								<h3><?php echo esc_html( $card['card_title'] ); ?></h3>
								<p><?php echo esc_html( $card['card_description'] ); ?></p>
								<a href="<?php echo esc_url( $card['card_link']['url'] ); ?>" class="learn-more-link">
									<span><?php echo esc_html( $card['card_link_text'] ); ?></span>
									<div class="arrow-wrap"><i class="ph-bold ph-arrow-right"></i></div>
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
