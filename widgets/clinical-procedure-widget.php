<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Clinical_Procedure_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_clinical_procedure';
	}

	public function get_title() {
		return esc_html__( 'Otic Clinical Procedure', 'otic-eye-care' );
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
				'default' => esc_html__( 'Clinical Procedure', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'What is [Microsuction?]', 'otic-eye-care' ),
				'description' => esc_html__( 'Wrap the gradient part in brackets like [Microsuction?]', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'The gold standard for safe and effective ear wax removal. We use clinical-grade microscopes and calibrated suction to ensure absolute precision.', 'otic-eye-care' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_steps',
			[
				'label' => esc_html__( 'Process Steps', 'otic-eye-care' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'step_icon',
			[
				'label' => esc_html__( 'Icon Class', 'otic-eye-care' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'ph-duotone ph-microscope',
					'library' => 'phosphor',
				],
			]
		);

		$repeater->add_control(
			'step_title',
			[
				'label' => esc_html__( 'Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Step Title', 'otic-eye-care' ),
			]
		);

		$repeater->add_control(
			'step_description',
			[
				'label' => esc_html__( 'Description', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Step description goes here.', 'otic-eye-care' ),
			]
		);

		$repeater->add_control(
			'extra_class',
			[
				'label' => esc_html__( 'Extra Icon Class', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'description' => esc_html__( 'e.g., icon-focus, icon-suction, icon-specialist', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'steps',
			[
				'label' => esc_html__( 'Steps', 'otic-eye-care' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'step_title' => esc_html__( 'Micro-Observation', 'otic-eye-care' ),
						'step_description' => esc_html__( 'Using Carl Zeiss optics for unparalleled visual clarity within the ear canal.', 'otic-eye-care' ),
						'step_icon' => [ 'value' => 'ph-duotone ph-microscope' ],
						'extra_class' => 'icon-focus',
					],
					[
						'step_title' => esc_html__( 'Calibrated Suction', 'otic-eye-care' ),
						'step_description' => esc_html__( 'Medical-grade vacuuming that is gentle, dry, and exceptionally safe.', 'otic-eye-care' ),
						'step_icon' => [ 'value' => 'ph-duotone ph-first-aid' ],
						'extra_class' => 'icon-suction',
					],
					[
						'step_title' => esc_html__( 'Specialist Care', 'otic-eye-care' ),
						'step_description' => esc_html__( 'Guided by NHS standards, ensuring a pain-free and professional experience.', 'otic-eye-care' ),
						'step_icon' => [ 'value' => 'ph-duotone ph-seal-check' ],
						'extra_class' => 'icon-specialist',
					],
				],
				'title_field' => '{{{ step_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image',
			[
				'label' => esc_html__( 'Image & Floating Cards', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'main_image',
			[
				'label' => esc_html__( 'Main Image', 'otic-eye-care' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [ 'url' => plugins_url( '../assets/microsuction.png', __FILE__ ) ],
			]
		);

		$this->add_control(
			'card_title',
			[
				'label' => esc_html__( 'Floating Card Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'DeVilBiss Suction',
			]
		);

		$this->add_control(
			'card_desc',
			[
				'label' => esc_html__( 'Floating Card Description', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Hospital-grade safety & comfort.',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['title'] );
		?>
		<section class="microsuction-editorial" style="padding: 80px 0; background: #ffffff; position: relative; overflow: hidden;">
			<div style="position: absolute; top: 0; right: 0; width: 40%; height: 100%; background: #f8fafc; z-index: 0;"></div>

			<div class="container" style="position: relative; z-index: 2;">
				<div style="display: grid; grid-template-columns: 1.1fr 1fr; gap: 6rem; align-items: center;">
					<div>
						<div class="editorial-badge" style="background: rgba(74, 144, 226, 0.1); color: #4A90E2; padding: 0.6rem 1.8rem; border-radius: 99px; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem; display: inline-block; margin-bottom: 2rem;">
							<?php echo esc_html( $settings['badge_text'] ); ?>
						</div>
						<h2 style="font-size: 4rem; line-height: 1.1; margin-bottom: 1.5rem; letter-spacing: -0.04em; color: var(--primary-dark); font-weight: 800;">
							<?php echo wp_kses_post( $title ); ?>
						</h2>

						<p style="font-size: 1.2rem; line-height: 1.6; color: var(--text-muted); margin-bottom: 2.5rem; max-width: 580px;">
							<?php echo esc_html( $settings['description'] ); ?>
						</p>

						<div class="clinical-process" style="display: flex; flex-direction: column; gap: 2.5rem; position: relative;">
							<div style="position: absolute; top: 30px; left: 30px; bottom: 30px; width: 2px; background: rgba(74, 144, 226, 0.1); z-index: 0;">
								<div class="signal-pulse"></div>
							</div>

							<?php foreach ( $settings['steps'] as $index => $step ) : ?>
								<div class="signal-step-item">
									<div class="signal-node">
										<i class="<?php echo esc_attr( $step['step_icon']['value'] ); ?> <?php echo esc_attr( $step['extra_class'] ); ?>"></i>
										<?php if ( $index === 0 ) echo '<div class="focus-crosshair"></div>'; ?>
										<?php if ( $index === 1 ) echo '<div class="suction-line"></div>'; ?>
									</div>
									<div class="pulse-content">
										<h5 style="margin: 0 0 0.5rem 0; font-family: 'Outfit', sans-serif !important; font-weight: 700 !important; font-size: 1.2rem !important; color: var(--primary-dark) !important;"><?php echo esc_html( $step['step_title'] ); ?></h5>
										<p style="margin: 0; font-family: 'Inter', sans-serif !important; font-size: 0.95rem !important; line-height: 1.6 !important; color: var(--text-muted) !important;"><?php echo esc_html( $step['step_description'] ); ?></p>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<div style="position: relative; padding: 20px;">
						<div style="width: 100%; border-radius: 60px; overflow: hidden; box-shadow: 0 40px 100px rgba(0,0,0,0.12);">
							<img src="<?php echo esc_url( $settings['main_image']['url'] ); ?>" alt="Clinical Microsuction" style="width: 100%; height: auto; display: block;">
						</div>

						<div style="position: absolute; bottom: 10%; left: -15%; background: white; padding: 1.5rem; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); display: flex; align-items: center; gap: 1rem; border: 1px solid rgba(0,0,0,0.02); z-index: 3;">
							<div style="width: 45px; height: 45px; background: rgba(59, 130, 246, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: #3B82F6; flex-shrink: 0;">
								<i class="ph-duotone ph-first-aid"></i>
							</div>
							<div>
								<h4 style="font-size: 1rem; color: #1E3A8A; font-weight: 800; margin: 0;"><?php echo esc_html( $settings['card_title'] ); ?></h4>
								<p style="font-size: 0.8rem; color: var(--text-muted); margin: 0; line-height: 1.4;"><?php echo esc_html( $settings['card_desc'] ); ?></p>
							</div>
						</div>

						<div style="position: absolute; top: 0; right: 0; width: 90px; height: 90px; background: white; border-radius: 50%; box-shadow: 0 15px 40px rgba(0,0,0,0.1); display: flex; align-items: center; justify-content: center; z-index: 4;">
							<i class="ph-duotone ph-microscope" style="color: #3B82F6; font-size: 2.5rem;"></i>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
