<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Otic_Corporate_Emergency_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_corporate_emergency';
	}

	public function get_title() {
		return esc_html__( 'Otic Corporate & Emergency', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-columns';
	}

	public function get_categories() {
		return [ 'otic-eye-care' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_corporate',
			[
				'label' => esc_html__( 'Corporate Section', 'otic-eye-care' ),
			]
		);

		$this->add_control( 'corp_title', [ 'label' => 'Title', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Corporate <br>Partnerships' ] );
		$this->add_control( 'corp_desc1', [ 'label' => 'Description 1', 'type' => Controls_Manager::TEXTAREA, 'default' => 'We are proud to provide professional ear care to some of the most prestigious music and media companies in London.' ] );
		$this->add_control( 'corp_desc2', [ 'label' => 'Description 2', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Boost employee wellbeing with our on-site or clinic-based ear cleaning services. Contact us for bespoke corporate rates.' ] );
		$this->add_control( 'corp_btn_text', [ 'label' => 'Button Text', 'type' => Controls_Manager::TEXT, 'default' => 'Email Corporate Team' ] );
		$this->add_control( 'corp_btn_link', [ 'label' => 'Button Link', 'type' => Controls_Manager::URL, 'default' => [ 'url' => 'mailto:info@oticearcare.co.uk' ] ] );
		$this->add_control( 'corp_icon', [ 'label' => 'Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-duotone ph-buildings' ] ] );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_emergency',
			[
				'label' => esc_html__( 'Emergency Section', 'otic-eye-care' ),
			]
		);

		$this->add_control( 'emerg_title', [ 'label' => 'Title', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Emergency <br>Appointments' ] );
		$this->add_control( 'emerg_desc', [ 'label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Immediate mobile ear wax removal clinics across London and the Home Counties. Available 24/7 for urgent relief.' ] );
		$this->add_control( 'emerg_price', [ 'label' => 'Price Text', 'type' => Controls_Manager::TEXT, 'default' => '£175' ] );
		$this->add_control( 'emerg_btn_text', [ 'label' => 'Button Text', 'type' => Controls_Manager::TEXT, 'default' => '(+44) 7852 992 668' ] );
		$this->add_control( 'emerg_btn_link', [ 'label' => 'Button Link', 'type' => Controls_Manager::URL, 'default' => [ 'url' => 'tel:+447852992668' ] ] );
		$this->add_control( 'emerg_icon', [ 'label' => 'Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-duotone ph-ambulance' ] ] );

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="corporate-emergency-section container" style="padding: 100px 0;">
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 40px;">

				<!-- Corporate Section -->
				<div class="corporate-card" style="background: white; border-radius: 40px; padding: 50px; border: 1px solid rgba(0,0,0,0.05); box-shadow: 0 20px 50px rgba(0,0,0,0.03); position: relative; overflow: hidden; transition: all 0.4s ease;">
					<div style="position: absolute; top: -20%; right: -10%; width: 300px; height: 300px; background: rgba(57, 134, 255, 0.05); border-radius: 50%; filter: blur(50px); z-index: 0;"></div>

					<div style="position: relative; z-index: 2;">
						<div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px;">
							<div style="width: 80px; height: 80px; background: #f0f7ff; border-radius: 20px; display: flex; align-items: center; justify-content: center; color: #3986FF; font-size: 2.5rem; box-shadow: 0 10px 20px rgba(57, 134, 255, 0.1);">
								<i class="<?php echo esc_attr( $settings['corp_icon']['value'] ); ?>"></i>
							</div>
							<div>
								<h3 style="font-size: 2.2rem; color: #1e293b; font-family: 'Outfit'; margin: 0; line-height: 1.1;">
									<?php echo wp_kses_post( $settings['corp_title'] ); ?>
								</h3>
							</div>
						</div>

						<p style="font-size: 1.2rem; line-height: 1.6; color: #64748b; margin-bottom: 25px;">
							<?php echo esc_html( $settings['corp_desc1'] ); ?>
						</p>

						<p style="font-size: 1.1rem; line-height: 1.6; color: #64748b; margin-bottom: 40px;">
							<?php echo esc_html( $settings['corp_desc2'] ); ?>
						</p>

						<a href="<?php echo esc_url( $settings['corp_btn_link']['url'] ); ?>" class="btn-vibrant" style="background: #1e293b; color: white; padding: 18px 35px; border-radius: 100px; text-decoration: none; font-weight: 700; display: inline-flex; align-items: center; gap: 12px; transition: all 0.3s; box-shadow: 0 10px 25px rgba(30, 41, 59, 0.2);">
							<i class="ph-bold ph-envelope-simple"></i> <?php echo esc_html( $settings['corp_btn_text'] ); ?>
						</a>
					</div>
				</div>

				<!-- Emergency Section -->
				<div class="emergency-card" style="background: linear-gradient(135deg, #0D2E85, #0852C6); border-radius: 40px; padding: 50px; color: white; position: relative; overflow: hidden; box-shadow: 0 30px 70px rgba(13, 46, 133, 0.3); transition: all 0.4s ease;">
					<div style="position: absolute; inset: 0; background-image: radial-gradient(rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 30px 30px; pointer-events: none;"></div>

					<div style="position: relative; z-index: 2;">
						<div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px;">
							<div style="width: 80px; height: 80px; background: rgba(255,255,255,0.1); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: white; font-size: 2.5rem; position: relative; backdrop-filter: blur(10px);">
								<i class="<?php echo esc_attr( $settings['emerg_icon']['value'] ); ?>"></i>
								<span style="position: absolute; top: -5px; right: -5px; width: 15px; height: 15px; background: #F87171; border-radius: 50%; border: 3px solid #0D2E85; animation: pulse 2s infinite;"></span>
							</div>
							<div>
								<h3 style="font-size: 2.2rem; font-family: 'Outfit'; margin: 0; line-height: 1.1;">
									<?php echo wp_kses_post( $settings['emerg_title'] ); ?>
								</h3>
							</div>
						</div>

						<p style="font-size: 1.2rem; line-height: 1.6; color: rgba(255,255,255,0.85); margin-bottom: 25px;">
							<?php echo esc_html( $settings['emerg_desc'] ); ?>
						</p>

						<div style="background: rgba(255,255,255,0.08); padding: 25px; border-radius: 24px; border: 1px dashed rgba(255,255,255,0.2); margin-bottom: 40px; backdrop-filter: blur(5px);">
							<p style="margin: 0; font-size: 1.15rem; line-height: 1.5; font-weight: 500;">
								Emergency appointments incur an additional fee of <span style="color: #8BE09E; font-size: 1.6rem; font-weight: 900; margin-left: 5px;"><?php echo esc_html( $settings['emerg_price'] ); ?></span>
							</p>
						</div>

						<a href="<?php echo esc_url( $settings['emerg_btn_link']['url'] ); ?>" class="btn-vibrant" style="background: white; color: #0D2E85; padding: 18px 35px; border-radius: 100px; text-decoration: none; font-weight: 800; display: inline-flex; align-items: center; gap: 12px; transition: all 0.3s; box-shadow: 0 10px 30px rgba(255,255,255,0.15);">
							<i class="ph-bold ph-phone-call"></i> <?php echo esc_html( $settings['emerg_btn_text'] ); ?>
						</a>
					</div>
				</div>

			</div>
		</section>
		<?php
	}
}
