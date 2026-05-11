<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_London_Coverage_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_london_coverage';
	}

	public function get_title() {
		return esc_html__( 'Otic London Coverage', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-map-pin';
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

		$this->add_control( 'badge_text', [ 'label' => 'Badge Text', 'type' => Controls_Manager::TEXT, 'default' => 'London Coverage' ] );
		$this->add_control( 'title', [ 'label' => 'Title', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Mobile Ear Wax Removal [Across London]', 'description' => 'Wrap in [] for gradient.' ] );
		$this->add_control( 'subtitle', [ 'label' => 'Subtitle', 'type' => Controls_Manager::TEXT, 'default' => 'We cover London & Essex [And parts of Kent]' ] );

		$repeater = new Repeater();
		$repeater->add_control( 'area_text', [ 'label' => 'Area Text', 'type' => Controls_Manager::TEXT, 'default' => 'North London' ] );
		$this->add_control( 'areas', [ 'label' => 'Coverage Areas', 'type' => Controls_Manager::REPEATER, 'fields' => $repeater->get_controls(), 'default' => [
			[ 'area_text' => 'North London' ],
			[ 'area_text' => 'East London' ],
			[ 'area_text' => 'West London' ],
			[ 'area_text' => 'North West London' ],
			[ 'area_text' => 'South East London' ],
			[ 'area_text' => 'South West London' ],
		], 'title_field' => '{{{ area_text }}}' ] );

		$this->add_control( 'alert_text', [ 'label' => 'Alert Text', 'type' => Controls_Manager::TEXTAREA, 'default' => 'If you require an appointment outside of the London areas we cover, a minimum travel fee of [£175] will be charged.' ] );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image',
			[
				'label' => esc_html__( 'Map & Tech Element', 'otic-eye-care' ),
			]
		);

		$this->add_control( 'map_image', [ 'label' => 'Map Image', 'type' => Controls_Manager::MEDIA, 'default' => [ 'url' => plugins_url( '../assets/map.png', __FILE__ ) ] ] );
		$this->add_control( 'tech_title', [ 'label' => 'Tech Title', 'type' => Controls_Manager::TEXT, 'default' => 'Clinician Tracking' ] );
		$this->add_control( 'tech_label', [ 'label' => 'Tech Label', 'type' => Controls_Manager::TEXT, 'default' => 'Live Updates' ] );

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span class="london-text-gradient">', '</span>'], $settings['title'] );
		$subtitle = str_replace( ['[', ']'], ['<span style="color: #3986FF;">', '</span>'], $settings['subtitle'] );
		$alert = str_replace( ['[', ']'], ['<strong style="font-size: 1.3rem;">', '</strong>'], $settings['alert_text'] );
		?>
		<section class="location-section" style="padding: 100px 0; background: #f8fafc; position: relative; overflow: hidden;">
			<div class="container" style="position: relative; z-index: 2;">
				<div class="text-img-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); gap: 60px; align-items: center;">

					<!-- Left: Location Details -->
					<div>
						<div class="location-badge" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(57, 134, 255, 0.1); color: #3986FF; padding: 8px 20px; border-radius: 100px; font-weight: 800; font-size: 0.85rem; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 25px; border: 1px solid rgba(57, 134, 255, 0.2);">
							<i class="ph-fill ph-map-pin"></i>
							<?php echo esc_html( $settings['badge_text'] ); ?>
						</div>

						<h2 style="font-size: 3.5rem; font-weight: 900; line-height: 1.1; color: #1e293b; font-family: 'Outfit'; margin-bottom: 15px;">
							<?php echo wp_kses_post( $title ); ?>
						</h2>
						<p style="font-size: 1.2rem; color: #64748b; margin-bottom: 30px; font-weight: 500;">
							<?php echo wp_kses_post( $subtitle ); ?>
						</p>

						<!-- Travel Fee Highlights -->
						<div style="display: flex; gap: 20px; margin-bottom: 40px;">
							<div style="background: white; padding: 20px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.03); flex: 1; border: 1px solid rgba(57, 134, 255, 0.1); text-align: center;">
								<i class="ph-bold ph-car" style="font-size: 2rem; color: #3986FF; margin-bottom: 10px;"></i>
								<h4 style="margin: 0; font-size: 1rem; color: #64748b; font-weight: 600;">Travel Included</h4>
								<p style="margin: 5px 0 0; font-size: 1.1rem; color: #1e293b; font-weight: 700;">Within Zones</p>
							</div>
							<div style="background: white; padding: 20px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.03); flex: 1; border: 1px solid rgba(57, 134, 255, 0.1); text-align: center;">
								<i class="ph-bold ph-currency-gbp" style="font-size: 2rem; color: #8BE09E; margin-bottom: 10px;"></i>
								<h4 style="margin: 0; font-size: 1rem; color: #64748b; font-weight: 600;">Travel Charge</h4>
								<p style="margin: 5px 0 0; font-size: 1.1rem; color: #1e293b; font-weight: 700;">£50 - £100</p>
							</div>
						</div>

						<!-- Area List -->
						<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 40px;">
							<?php foreach ( $settings['areas'] as $area ) : ?>
								<div style="display: flex; align-items: center; gap: 10px; color: #475569; font-size: 1.1rem; font-weight: 500;">
									<i class="ph-bold ph-check-circle" style="color: #3986FF;"></i> <?php echo esc_html( $area['area_text'] ); ?>
								</div>
							<?php endforeach; ?>
						</div>

						<!-- Outside London Alert -->
						<div style="background: #fef2f2; padding: 25px; border-radius: 20px; border-left: 5px solid #F87171; box-shadow: 0 10px 30px rgba(248, 113, 113, 0.05);">
							<p style="margin: 0; font-size: 1.1rem; color: #991b1b; line-height: 1.6;">
								<i class="ph-bold ph-warning-circle" style="margin-right: 8px; font-size: 1.2rem; transform: translateY(2px);"></i>
								<?php echo wp_kses_post( $alert ); ?>
							</p>
						</div>
					</div>

					<!-- Right: Map Image -->
					<div class="img-wrapper" style="position: relative;">
						<img src="<?php echo esc_url( $settings['map_image']['url'] ); ?>" alt="London Map" style="width: 100%; border-radius: 40px; box-shadow: 0 40px 80px rgba(0,0,0,0.1); position: relative; z-index: 1; border: 1px solid rgba(255,255,255,0.8);">

						<!-- Floating Tech Elements -->
						<div style="position: absolute; bottom: 10%; right: 5%; background: white; padding: 20px; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); z-index: 2; display: flex; align-items: center; gap: 12px; animation: float 5s ease-in-out infinite;">
							<div style="width: 45px; height: 45px; background: #f0f7ff; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #3986FF;">
								<i class="ph-fill ph-navigation-arrow" style="font-size: 1.5rem;"></i>
							</div>
							<div>
								<h4 style="margin: 0; font-size: 0.9rem; color: #64748b;"><?php echo esc_html( $settings['tech_title'] ); ?></h4>
								<p style="margin: 0; font-weight: 800; color: #1e293b;"><?php echo esc_html( $settings['tech_label'] ); ?></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<?php
	}
}
