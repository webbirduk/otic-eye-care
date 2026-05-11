<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Clinical_Advantage_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_clinical_advantage';
	}

	public function get_title() {
		return esc_html__( 'Otic Clinical Advantage', 'otic-eye-care' );
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
				'default' => esc_html__( 'The Clinical Advantage', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Why [Microsuction?]', 'otic-eye-care' ),
				'description' => esc_html__( 'Wrap the gradient part in brackets like [Microsuction?]', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Our specialist clinicians use hospital-grade microsuction technology to provide a safe, dry, and highly effective ear cleaning service. This procedure is widely considered the gold standard for precision and patient comfort.', 'otic-eye-care' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_left',
			[
				'label' => esc_html__( 'Left Branch', 'otic-eye-care' ),
			]
		);

		$repeater_left = new Repeater();
		$repeater_left->add_control( 'icon', [ 'label' => 'Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-duotone ph-shield-check' ] ] );
		$repeater_left->add_control( 'title', [ 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'NHS Gold Standard' ] );
		$repeater_left->add_control( 'desc', [ 'label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Practiced and supported by NICE guidance for ear care.' ] );

		$this->add_control( 'left_nodes', [ 'label' => 'Nodes', 'type' => Controls_Manager::REPEATER, 'fields' => $repeater_left->get_controls(), 'default' => [
			[ 'title' => 'NHS Gold Standard', 'icon' => [ 'value' => 'ph-duotone ph-shield-check' ] ],
			[ 'title' => 'Lower Risk', 'icon' => [ 'value' => 'ph-duotone ph-warning-circle' ] ],
			[ 'title' => 'Better Tolerated', 'icon' => [ 'value' => 'ph-duotone ph-heartbeat' ] ],
		], 'title_field' => '{{{ title }}}' ] );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_right',
			[
				'label' => esc_html__( 'Right Branch', 'otic-eye-care' ),
			]
		);

		$repeater_right = new Repeater();
		$repeater_right->add_control( 'icon', [ 'label' => 'Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-duotone ph-stethoscope' ] ] );
		$repeater_right->add_control( 'title', [ 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Expert Standards' ] );
		$repeater_right->add_control( 'desc', [ 'label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Clinicians trained to professional NHS & private standards.' ] );

		$this->add_control( 'right_nodes', [ 'label' => 'Nodes', 'type' => Controls_Manager::REPEATER, 'fields' => $repeater_right->get_controls(), 'default' => [
			[ 'title' => 'Expert Standards', 'icon' => [ 'value' => 'ph-duotone ph-stethoscope' ] ],
			[ 'title' => 'Itchy Ear Relief', 'icon' => [ 'value' => 'ph-duotone ph-drop' ] ],
			[ 'title' => 'Instant Hearing', 'icon' => [ 'value' => 'ph-duotone ph-waveform' ] ],
		], 'title_field' => '{{{ title }}}' ] );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_core',
			[
				'label' => esc_html__( 'Core Image', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'core_image',
			[
				'label' => esc_html__( 'Core Image', 'otic-eye-care' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [ 'url' => plugins_url( '../assets/ear_treatment.png', __FILE__ ) ],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['title'] );
		?>
		<section class="data-tree-section" style="padding: 100px 0; background: #fdfdfd; overflow: hidden; position: relative;">
			<div style="position: absolute; inset: 0; background-image: radial-gradient(rgba(74, 144, 226, 0.05) 1px, transparent 1px); background-size: 40px 40px; pointer-events: none;"></div>

			<div class="container">
				<div style="text-align: center; margin-bottom: 80px;">
					<div style="color: var(--primary); font-weight: 800; letter-spacing: 3px; text-transform: uppercase; font-size: 0.85rem; margin-bottom: 1.5rem; background: rgba(74, 144, 226, 0.1); display: inline-block; padding: 0.5rem 1.5rem; border-radius: 99px;">
						<?php echo esc_html( $settings['badge_text'] ); ?>
					</div>
					<h2 class="section-title" style="font-size: 3.5rem; margin-bottom: 1.5rem;"><?php echo wp_kses_post( $title ); ?></h2>
					<p style="max-width: 800px; margin: 0 auto; font-size: 1.2rem; color: var(--text-muted); line-height: 1.7;">
						<?php echo esc_html( $settings['description'] ); ?>
					</p>
				</div>

				<div class="tree-grid-container">
					<div class="tree-branch left-branch">
						<?php foreach ( $settings['left_nodes'] as $node ) : ?>
							<div class="tree-node">
								<div class="node-icon"><i class="<?php echo esc_attr( $node['icon']['value'] ); ?>"></i></div>
								<div class="node-content">
									<h4><?php echo esc_html( $node['title'] ); ?></h4>
									<p><?php echo esc_html( $node['desc'] ); ?></p>
								</div>
								<div class="node-line"></div>
							</div>
						<?php endforeach; ?>
					</div>

					<div class="tree-core">
						<div class="core-image-wrap">
							<div class="core-glow"></div>
							<img src="<?php echo esc_url( $settings['core_image']['url'] ); ?>" alt="Clinical Core">
						</div>
						<div class="pulse-ring"></div>
						<div class="pulse-ring" style="animation-delay: -1s;"></div>
					</div>

					<div class="tree-branch right-branch">
						<?php foreach ( $settings['right_nodes'] as $node ) : ?>
							<div class="tree-node">
								<div class="node-line"></div>
								<div class="node-icon" style="color: var(--secondary);"><i class="<?php echo esc_attr( $node['icon']['value'] ); ?>"></i></div>
								<div class="node-content">
									<h4><?php echo esc_html( $node['title'] ); ?></h4>
									<p><?php echo esc_html( $node['desc'] ); ?></p>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
