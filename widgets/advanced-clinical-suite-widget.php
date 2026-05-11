<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Advanced_Clinical_Suite_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_advanced_clinical_suite';
	}

	public function get_title() {
		return esc_html__( 'Otic Advanced Clinical Suite', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
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
				'default' => esc_html__( 'Advanced Clinical Suite', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Next-Gen [Ear Treatments]', 'otic-eye-care' ),
				'description' => esc_html__( 'Wrap the gradient part in brackets like [Ear Treatments]', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Precision-engineered medical interventions for complex ear health, delivered with elite clinical standards at your convenience.', 'otic-eye-care' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_cards',
			[
				'label' => esc_html__( 'Treatment Cards', 'otic-eye-care' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control( 'image', [ 'label' => 'Image', 'type' => Controls_Manager::MEDIA ] );
		$repeater->add_control( 'title', [ 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Ear Infection Management' ] );
		$repeater->add_control( 'desc', [ 'label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Elite clinical diagnosis and targeted intervention for severe infections.' ] );
		$repeater->add_control( 'btn_text', [ 'label' => 'Button Text', 'type' => Controls_Manager::TEXT, 'default' => 'Procedure Details' ] );
		$repeater->add_control( 'btn_link', [ 'label' => 'Button Link', 'type' => Controls_Manager::URL, 'default' => [ 'url' => '#' ] ] );
		$repeater->add_control( 'color', [ 'label' => 'Theme Color', 'type' => Controls_Manager::COLOR, 'default' => '#3986FF' ] );

		$this->add_control( 'cards', [ 'label' => 'Cards', 'type' => Controls_Manager::REPEATER, 'fields' => $repeater->get_controls(), 'default' => [
			[
				'title' => 'Ear Infection Management',
				'color' => '#3986FF',
				'image' => [ 'url' => plugins_url( '../assets/ear_infection_clinical.png', __FILE__ ) ],
			],
			[
				'title' => 'Foreign Body Extraction',
				'color' => '#8BE09E',
				'image' => [ 'url' => plugins_url( '../assets/foreign_body_extraction_microscopy.png', __FILE__ ) ],
			],
		], 'title_field' => '{{{ title }}}' ] );

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span class="vibrant-text-gradient">', '</span>'], $settings['title'] );
		?>
		<section class="ear-treatments-vibrant" style="padding: 120px 0; background: #080b12; position: relative; overflow: hidden; color: white;">
			<div class="container" style="position: relative; z-index: 2;">
				<div style="text-align: center; margin-bottom: 100px;">
					<div class="vibrant-badge" style="display: inline-flex; align-items: center; gap: 10px; background: rgba(57, 134, 255, 0.1); color: #3986FF; padding: 10px 25px; border-radius: 100px; font-weight: 800; font-size: 0.9rem; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 25px; border: 1px solid rgba(57, 134, 255, 0.2); backdrop-filter: blur(10px);">
						<i class="ph-bold ph-sparkle" style="animation: rotate-slow 4s linear infinite;"></i>
						<?php echo esc_html( $settings['badge_text'] ); ?>
					</div>
					<h2 style="font-size: 5rem; font-weight: 900; line-height: 1.1; margin-bottom: 25px; letter-spacing: -0.04em; font-family: 'Outfit', sans-serif !important;">
						<?php echo wp_kses_post( $title ); ?>
					</h2>
					<p style="max-width: 800px; margin: 0 auto; font-size: 1.35rem; color: rgba(255,255,255,0.7); line-height: 1.6; font-weight: 300; font-family: 'Inter', sans-serif !important;">
						<?php echo esc_html( $settings['description'] ); ?>
					</p>
				</div>

				<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); gap: 50px;">
					<?php foreach ( $settings['cards'] as $card ) : ?>
						<div class="vibrant-card" style="background: rgba(255, 255, 255, 0.03); border-radius: 50px; padding: 70px; border: 1px solid rgba(255,255,255,0.08); backdrop-filter: blur(20px); position: relative; transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1); overflow: hidden; cursor: pointer;">
							<div class="card-glow-overlay" style="position: absolute; inset: 0; background: radial-gradient(circle at center, <?php echo esc_attr( $card['color'] ); ?>26, transparent 70%); opacity: 0; transition: opacity 0.6s;"></div>

							<div style="position: relative; z-index: 2;">
								<div class="icon-sphere" style="width: 160px; height: 160px; background: <?php echo esc_attr( $card['color'] ); ?>1a; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 40px; box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3); position: relative; overflow: visible;">
									<img src="<?php echo esc_url( $card['image']['url'] ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%; border: 4px solid <?php echo esc_attr( $card['color'] ); ?>4d;">
									<div style="position: absolute; inset: -20px; border: 2px solid <?php echo esc_attr( $card['color'] ); ?>66; border-radius: 50%; border-top-color: white; animation: rotate-slow 5s linear infinite;"></div>
								</div>

								<h3 style="font-size: 2.8rem; font-weight: 800; margin-bottom: 20px; font-family: 'Outfit'; color: white; line-height: 1.1;">
									<?php 
									$title_parts = explode( ' ', $card['title'], 2 );
									echo esc_html( $title_parts[0] );
									if ( isset( $title_parts[1] ) ) {
										echo ' <br><span style="color: ' . esc_attr( $card['color'] ) . ';">' . esc_html( $title_parts[1] ) . '</span>';
									}
									?>
								</h3>
								<p style="font-size: 1.25rem; color: rgba(255,255,255,0.6); line-height: 1.7; margin-bottom: 45px; max-width: 90%;">
									<?php echo esc_html( $card['desc'] ); ?>
								</p>

								<div class="card-action" style="display: inline-flex; align-items: center; gap: 15px; background: <?php echo esc_attr( $card['color'] ); ?>; color: white; padding: 15px 35px; border-radius: 100px; font-weight: 700; font-size: 1rem; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 10px 20px <?php echo esc_attr( $card['color'] ); ?>4d; transition: all 0.3s;">
									<?php echo esc_html( $card['btn_text'] ); ?> <i class="ph-bold ph-arrow-right"></i>
								</div>
							</div>

							<div class="data-stream" style="position: absolute; top: 0; right: 40px; height: 100%; width: 1px; background: linear-gradient(to bottom, transparent, <?php echo esc_attr( $card['color'] ); ?>, transparent); opacity: 0.2; transform: translateY(-100%); transition: transform 1.5s cubic-bezier(0.23, 1, 0.32, 1);"></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
