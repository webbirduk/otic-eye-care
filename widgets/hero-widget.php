<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Otic_Hero_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_hero';
	}

	public function get_title() {
		return esc_html__( 'Otic Hero', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-hero-image';
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
			'video_url',
			[
				'label' => esc_html__( 'YouTube Video ID', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => '01iI_AIdEPA',
				'description' => esc_html__( 'Enter the YouTube Video ID (e.g., 01iI_AIdEPA)', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'badge_text',
			[
				'label' => esc_html__( 'Badge Text', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Ear Wax Gone - London', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Mobile Ear Wax Removal [London]', 'otic-eye-care' ),
				'description' => esc_html__( 'Wrap the gradient part in brackets like [London]', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Experience hospital-grade ear care in the comfort of your home. Our expert ENT Doctors are available 24/7 across London for safe, gentle microsuction.', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'btn1_text',
			[
				'label' => esc_html__( 'Primary Button Text', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Book Now', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'btn1_link',
			[
				'label' => esc_html__( 'Primary Button Link', 'otic-eye-care' ),
				'type' => Controls_Manager::URL,
				'default' => [ 'url' => '#' ],
			]
		);

		$this->add_control(
			'btn2_text',
			[
				'label' => esc_html__( 'Secondary Button Text', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn More', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'btn2_link',
			[
				'label' => esc_html__( 'Secondary Button Link', 'otic-eye-care' ),
				'type' => Controls_Manager::URL,
				'default' => [ 'url' => '#' ],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_form',
			[
				'label' => esc_html__( 'Form', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'form_title',
			[
				'label' => esc_html__( 'Form Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Request Callback', 'otic-eye-care' ),
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['title'] );
		?>
		<section class="hero" id="home">
			<div class="hero-video-container">
				<iframe width="1214" height="683"
					src="https://www.youtube.com/embed/<?php echo esc_attr( $settings['video_url'] ); ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo esc_attr( $settings['video_url'] ); ?>&controls=0&rel=0&enablejsapi=1"
					title="Mobile Ear Wax Removal London" frameborder="0" allow="autoplay; encrypted-media"
					allowfullscreen></iframe>
			</div>
			<div class="hero-overlay"></div>
			<div class="container hero-content">
				<div class="hero-text">
					<div class="badge">
						<i class="ph-fill ph-star"></i> <?php echo esc_html( $settings['badge_text'] ); ?>
					</div>
					<h1><?php echo wp_kses_post( $title ); ?></h1>
					<p><?php echo esc_html( $settings['description'] ); ?></p>
					<div class="hero-actions">
						<a href="<?php echo esc_url( $settings['btn1_link']['url'] ); ?>" class="btn btn-primary btn-lg">
							<?php echo esc_html( $settings['btn1_text'] ); ?> <i class="ph-bold ph-arrow-right"></i>
						</a>
						<a href="<?php echo esc_url( $settings['btn2_link']['url'] ); ?>" class="btn btn-outline btn-lg">
							<?php echo esc_html( $settings['btn2_text'] ); ?>
						</a>
					</div>
				</div>

				<div class="hero-form-card">
					<h3><?php echo esc_html( $settings['form_title'] ); ?></h3>
					<form class="appointment-form">
						<div class="form-group">
							<input type="text" placeholder="Full Name" required>
						</div>
						<div class="form-group">
							<input type="tel" placeholder="Phone Number" required>
						</div>
						<div class="form-group">
							<input type="text" placeholder="London Postcode" required>
						</div>
						<div class="form-group">
							<select required>
								<option value="" disabled selected>Select Treatment</option>
								<option value="wax">Ear Wax Removal</option>
								<option value="infection">Ear Infection</option>
								<option value="foreign">Foreign Body Removal</option>
								<option value="children">Children's Ear Care</option>
							</select>
						</div>
						<button type="submit" class="btn btn-primary">
							Request Callback <i class="ph-bold ph-paper-plane-tilt"></i>
						</button>
					</form>
					<p class="hero-secure-text">
						<i class="ph-fill ph-shield-check"></i> Secure & Confidential
					</p>
				</div>
			</div>
		</section>
		<?php
	}
}
