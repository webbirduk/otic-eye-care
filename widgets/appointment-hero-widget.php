<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Appointment_Hero_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_appointment_hero';
	}

	public function get_title() {
		return esc_html__( 'Otic Appointment Hero', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-hero-section';
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
			'badge_text',
			[
				'label' => esc_html__( 'Badge Text', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Secure Online Booking', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Schedule Your [Clinical Consultation]', 'otic-eye-care' ),
				'description' => esc_html__( 'Wrap the gradient part in brackets like [Consultation]', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Select your preferred service, specialist, and time. Our mobile clinics bring advanced ENT care directly to your location across London.', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Background Image', 'otic-eye-care' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&q=80&w=2070',
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'benefit_icon',
			[
				'label' => esc_html__( 'Icon', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'ph-fill ph-clock',
				'description' => 'Phosphor icon class (e.g., ph-fill ph-clock)',
			]
		);

		$repeater->add_control(
			'benefit_text',
			[
				'label' => esc_html__( 'Text', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '24/7 Availability', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'benefits',
			[
				'label' => esc_html__( 'Benefits', 'otic-eye-care' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'benefit_icon' => 'ph-fill ph-clock',
						'benefit_text' => esc_html__( 'Same-Day Appointments', 'otic-eye-care' ),
					],
					[
						'benefit_icon' => 'ph-fill ph-house',
						'benefit_text' => esc_html__( 'Home & Office Visits', 'otic-eye-care' ),
					],
					[
						'benefit_icon' => 'ph-fill ph-shield-check',
						'benefit_text' => esc_html__( 'Hospital-Grade Safety', 'otic-eye-care' ),
					],
				],
				'title_field' => '{{{ benefit_text }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['title'] );
		?>
		<section class="otic-appointment-hero" style="position: relative; min-height: 70vh; display: flex; align-items: center; padding: 160px 0 100px; background: #000; overflow: hidden; border-bottom: 1px solid rgba(255,255,255,0.05);">
			
			<!-- Background Layer -->
			<div class="appointment-hero-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
				<img src="<?php echo esc_url( $settings['bg_image']['url'] ); ?>" alt="Background" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.4;">
				<div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.7) 100%);"></div>
			</div>

			<!-- Content Layer -->
			<div class="container" style="position: relative; z-index: 2;">
				<div style="max-width: 850px; margin: 0 auto; text-align: center;">
					
					<!-- Badge -->
					<div class="badge" style="background: rgba(57, 134, 255, 0.1) !important; border: 1px solid rgba(57, 134, 255, 0.25) !important; color: #3986FF; padding: 10px 24px !important; margin-bottom: 35px; text-transform: uppercase; letter-spacing: 2px; font-weight: 800; display: inline-flex; align-items: center; gap: 10px; border-radius: 100px;">
						<i class="ph-fill ph-calendar-check" style="font-size: 1.2rem;"></i>
						<?php echo esc_html( $settings['badge_text'] ); ?>
					</div>

					<!-- Title -->
					<h1 style="font-size: 4.8rem; font-weight: 900; line-height: 1.05; color: #ffffff; font-family: 'Outfit'; margin-bottom: 25px; letter-spacing: -0.04em;">
						<?php echo wp_kses_post( $title ); ?>
					</h1>

					<!-- Description -->
					<p style="font-size: 1.4rem; color: rgba(255,255,255,0.7); line-height: 1.6; margin-bottom: 50px; font-weight: 400; max-width: 700px; margin-left: auto; margin-right: auto;">
						<?php echo esc_html( $settings['description'] ); ?>
					</p>

					<!-- Benefits Bar -->
					<div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; padding: 25px 40px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 24px; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
						<?php foreach ( $settings['benefits'] as $benefit ) : ?>
							<div style="display: flex; align-items: center; gap: 12px;">
								<div style="width: 42px; height: 42px; background: rgba(57, 134, 255, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #3986FF;">
									<i class="<?php echo esc_attr( $benefit['benefit_icon'] ); ?>" style="font-size: 1.4rem;"></i>
								</div>
								<span style="color: #ffffff; font-weight: 600; font-size: 1.05rem;"><?php echo esc_html( $benefit['benefit_text'] ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>

				</div>
			</div>

			<!-- Visual Accents -->
			<div style="position: absolute; bottom: -50px; left: -50px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(57, 134, 255, 0.15) 0%, transparent 70%); z-index: 1;"></div>
			<div style="position: absolute; top: -50px; right: -50px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(167, 139, 250, 0.1) 0%, transparent 70%); z-index: 1;"></div>
		</section>

		<style>
			@media (max-width: 768px) {
				.otic-appointment-hero h1 {
					font-size: 3rem !important;
				}
				.otic-appointment-hero p {
					font-size: 1.1rem !important;
				}
			}
		</style>
		<?php
	}
}
