<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Otic_Booking_Dashboard_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_booking_dashboard';
	}

	public function get_title() {
		return esc_html__( 'Otic Booking Dashboard', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-table';
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
			'title',
			[
				'label' => esc_html__( 'Dashboard Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Patient Portal', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Manage your clinical appointments, view treatment history, and update your patient profile securely.', 'otic-eye-care' ),
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="otic-booking-dashboard-wrapper" style="padding: 60px 0; background: #f8fafc; min-height: 600px;">
			<div class="container">
				
				<!-- Dashboard Header -->
				<div class="dashboard-header" style="text-align: center; margin-bottom: 50px;">
					<div class="badge" style="background: rgba(57, 134, 255, 0.1); color: #3986FF; padding: 8px 20px; border-radius: 100px; font-weight: 800; font-size: 0.85rem; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 20px; border: 1px solid rgba(57, 134, 255, 0.2);">
						<i class="ph-fill ph-user-circle"></i> Clinical Access
					</div>
					<h2 style="font-size: 3rem; font-weight: 900; color: #1e293b; font-family: 'Outfit'; margin-bottom: 15px;">
						<?php echo esc_html( $settings['title'] ); ?>
					</h2>
					<p style="font-size: 1.1rem; color: #64748b; max-width: 600px; margin: 0 auto; line-height: 1.6;">
						<?php echo esc_html( $settings['subtitle'] ); ?>
					</p>
				</div>

				<!-- Boocommerce Dashboard Integration -->
				<div class="otic-dashboard-inner" style="position: relative;">
					<style>
						/* Override Boocommerce styles to match Otic aesthetic */
						.bc-client-dash {
							border: none !important;
							box-shadow: 0 40px 80px rgba(15, 23, 42, 0.05) !important;
							padding: 45px !important;
							border-radius: 32px !important;
							background: #ffffff !important;
						}
						.bc-client-login-container {
							border: none !important;
							box-shadow: 0 40px 80px rgba(15, 23, 42, 0.05) !important;
							border-radius: 32px !important;
						}
						.bc-dash-tabs {
							border-bottom: 1px solid #f1f5f9 !important;
							margin-bottom: 40px !important;
						}
						.bc-dash-tab.active {
							border-bottom: 3px solid #3986FF !important;
							color: #3986FF !important;
						}
						.bc-booking-row:hover {
							background: #f8fafc !important;
						}
						.bc-client-action-btn {
							border-radius: 12px !important;
							transition: all 0.3s ease !important;
						}
						.bc-client-action-btn[data-action="reschedule"] {
							background: rgba(57, 134, 255, 0.1) !important;
							color: #3986FF !important;
							border: 1px solid rgba(57, 134, 255, 0.2) !important;
						}
						.bc-client-action-btn[data-action="cancel"] {
							background: rgba(248, 113, 113, 0.05) !important;
							color: #ef4444 !important;
							border: 1px solid rgba(248, 113, 113, 0.2) !important;
						}
						.bc-client-action-btn:hover {
							transform: translateY(-2px) !important;
							box-shadow: 0 5px 15px rgba(0,0,0,0.05) !important;
						}
					</style>
					<?php echo do_shortcode('[bc_client_dashboard]'); ?>
				</div>

			</div>
		</div>
		<?php
	}
}
