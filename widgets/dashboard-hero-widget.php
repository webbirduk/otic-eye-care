<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Dashboard_Hero_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_dashboard_hero';
	}

	public function get_title() {
		return esc_html__( 'Otic Dashboard Hero', 'otic-eye-care' );
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
				'default' => esc_html__( 'Secure Patient Portal', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Welcome to Your [Clinical Dashboard]', 'otic-eye-care' ),
				'description' => esc_html__( 'Wrap the gradient part in brackets like [Dashboard]', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Manage your treatments, track appointment history, and update your medical profile in a secure, hospital-grade environment.', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Background Image', 'otic-eye-care' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&q=80&w=2070',
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'feature_icon',
			[
				'label' => esc_html__( 'Icon', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'ph-fill ph-shield-check',
				'description' => 'Phosphor icon class (e.g., ph-fill ph-shield-check)',
			]
		);

		$repeater->add_control(
			'feature_text',
			[
				'label' => esc_html__( 'Text', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Encrypted Access', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'features',
			[
				'label' => esc_html__( 'Security Features', 'otic-eye-care' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'feature_icon' => 'ph-fill ph-shield-check',
						'feature_text' => esc_html__( 'Secure Data Encryption', 'otic-eye-care' ),
					],
					[
						'feature_icon' => 'ph-fill ph-lock-key',
						'feature_text' => esc_html__( 'Confidential Records', 'otic-eye-care' ),
					],
					[
						'feature_icon' => 'ph-fill ph-headset',
						'feature_text' => esc_html__( '24/7 Patient Support', 'otic-eye-care' ),
					],
				],
				'title_field' => '{{{ feature_text }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['title'] );
		?>
		<section class="otic-dashboard-hero" style="position: relative; min-height: 60vh; display: flex; align-items: center; padding: 140px 0 80px; background: #0f172a; overflow: hidden; border-bottom: 1px solid rgba(255,255,255,0.05);">
			
			<!-- Background Layer -->
			<div class="dashboard-hero-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
				<img src="<?php echo esc_url( $settings['bg_image']['url'] ); ?>" alt="Background" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.25;">
				<div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.6) 100%);"></div>
			</div>

			<!-- Content Layer -->
			<div class="container" style="position: relative; z-index: 2;">
				<div style="max-width: 800px;">
					
					<!-- Badge -->
					<div class="badge" style="background: rgba(16, 185, 129, 0.1) !important; border: 1px solid rgba(16, 185, 129, 0.2) !important; color: #10b981; padding: 8px 20px !important; margin-bottom: 30px; text-transform: uppercase; letter-spacing: 2px; font-weight: 800; display: inline-flex; align-items: center; gap: 10px; border-radius: 100px; font-size: 0.8rem;">
						<i class="ph-fill ph-lock-key" style="font-size: 1rem;"></i>
						<?php echo esc_html( $settings['badge_text'] ); ?>
					</div>

					<!-- Title -->
					<h1 style="font-size: 4.2rem; font-weight: 900; line-height: 1.1; color: #ffffff; font-family: 'Outfit'; margin-bottom: 20px; letter-spacing: -0.03em;">
						<?php echo wp_kses_post( $title ); ?>
					</h1>

					<!-- Description -->
					<p style="font-size: 1.25rem; color: rgba(255,255,255,0.65); line-height: 1.6; margin-bottom: 40px; font-weight: 400; max-width: 650px;">
						<?php echo esc_html( $settings['description'] ); ?>
					</p>

					<!-- Features Bar -->
					<div style="display: flex; flex-wrap: wrap; gap: 25px;">
						<?php foreach ( $settings['features'] as $feature ) : ?>
							<div style="display: flex; align-items: center; gap: 10px; padding: 12px 20px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);">
								<i class="<?php echo esc_attr( $feature['feature_icon'] ); ?>" style="font-size: 1.2rem; color: #3986FF;"></i>
								<span style="color: #ffffff; font-weight: 600; font-size: 0.95rem;"><?php echo esc_html( $feature['feature_text'] ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>

				</div>
			</div>

			<!-- Visual Accents -->
			<div style="position: absolute; top: 20%; right: 5%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(57, 134, 255, 0.08) 0%, transparent 70%); z-index: 1;"></div>
		</section>

		<style>
			@media (max-width: 768px) {
				.otic-dashboard-hero h1 {
					font-size: 2.8rem !important;
				}
				.otic-dashboard-hero p {
					font-size: 1.1rem !important;
				}
			}
		</style>
		<?php
	}
}
