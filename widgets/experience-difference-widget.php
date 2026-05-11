<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Experience_Difference_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_experience_difference';
	}

	public function get_title() {
		return esc_html__( 'Otic Experience Difference', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-star';
	}

	public function get_categories() {
		return [ 'otic-eye-care' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_images',
			[
				'label' => esc_html__( 'Images & Stats', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'main_image',
			[
				'label' => esc_html__( 'Main Circular Image', 'otic-eye-care' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [ 'url' => plugins_url( '../assets/professional_ear_wax_removal_procedure_1776407982983.png', __FILE__ ) ],
			]
		);

		$this->add_control(
			'stats_number',
			[
				'label' => esc_html__( 'Stats Number', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => '20k+',
			]
		);

		$this->add_control(
			'stats_label',
			[
				'label' => esc_html__( 'Stats Label', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Procedures',
			]
		);

		$this->add_control(
			'badge1_text',
			[
				'label' => esc_html__( 'Floating Badge 1 Text', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Safe & Gentle',
			]
		);

		$this->add_control(
			'badge2_text',
			[
				'label' => esc_html__( 'Floating Badge 2 Text', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Home Visit',
			]
		);

		$this->end_controls_section();

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
				'default' => esc_html__( 'Experience the Difference', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Why choose [Otic Ear Care]?', 'otic-eye-care' ),
				'description' => esc_html__( 'Wrap the gradient part in brackets like [Otic Ear Care]', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Our experienced clinicians have performed over 20,000 procedures across NHS and private settings. Using safe, medical-grade microsuction techniques, we provide effective and comfortable ear care you can trust.', 'otic-eye-care' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'feature_icon',
			[
				'label' => esc_html__( 'Icon Class', 'otic-eye-care' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'ph-duotone ph-house',
					'library' => 'phosphor',
				],
			]
		);

		$repeater->add_control(
			'feature_title',
			[
				'label' => esc_html__( 'Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Mobile Service', 'otic-eye-care' ),
			]
		);

		$repeater->add_control(
			'feature_description',
			[
				'label' => esc_html__( 'Description', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'We come to your home, office, or hotel anywhere in London.', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'features',
			[
				'label' => esc_html__( 'Features', 'otic-eye-care' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'feature_title' => esc_html__( 'Mobile Service', 'otic-eye-care' ),
						'feature_icon' => [ 'value' => 'ph-duotone ph-house' ],
					],
					[
						'feature_title' => esc_html__( '24/7 Availability', 'otic-eye-care' ),
						'feature_icon' => [ 'value' => 'ph-duotone ph-clock' ],
					],
					[
						'feature_title' => esc_html__( 'Hospital-Grade Kit', 'otic-eye-care' ),
						'feature_icon' => [ 'value' => 'ph-duotone ph-microscope' ],
					],
					[
						'feature_title' => esc_html__( 'Instant Results', 'otic-eye-care' ),
						'feature_icon' => [ 'value' => 'ph-duotone ph-ear' ],
					],
				],
				'title_field' => '{{{ feature_title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['title'] );
		?>
		<section class="why-choose-section" style="padding: 6rem 0; background: white;">
			<div class="container">
				<div style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 5rem; align-items: center;">
					<div class="img-wrapper" style="position: relative; display: flex; justify-content: center; align-items: center; min-height: 500px;">
						<div style="position: absolute; width: 450px; height: 450px; border: 2px dashed rgba(74, 144, 226, 0.2); border-radius: 50%; animation: rotate-slow 20s linear infinite;"></div>
						<div style="position: absolute; width: 480px; height: 480px; border: 1px solid rgba(74, 144, 226, 0.1); border-radius: 50%;"></div>

						<div style="position: relative; width: 380px; height: 380px; border-radius: 50%; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.15); border: 8px solid white; z-index: 2;">
							<img src="<?php echo esc_url( $settings['main_image']['url'] ); ?>" alt="Clinical Ear Wax Removal" style="width: 100%; height: 100%; object-fit: cover;">
							<div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.4), transparent 40%);"></div>
						</div>

						<div style="position: absolute; bottom: 10%; right: 5%; background: var(--primary); color: white; padding: 1.5rem 2rem; border-radius: 24px; box-shadow: 0 20px 40px rgba(74, 144, 226, 0.3); z-index: 3; text-align: center;">
							<div style="color: #FBBF24; font-size: 1rem; margin-bottom: 0.5rem; display: flex; justify-content: center; gap: 2px;">
								<i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i>
							</div>
							<p style="font-size: 2.5rem; font-weight: 800; line-height: 1; margin: 0; font-family: 'Outfit';"><?php echo esc_html( $settings['stats_number'] ); ?></p>
							<p style="font-size: 0.8rem; margin: 0; opacity: 0.9; text-transform: uppercase; letter-spacing: 1px;"><?php echo esc_html( $settings['stats_label'] ); ?></p>
						</div>

						<div style="position: absolute; top: 15%; left: 0%; background: white; padding: 0.8rem 1.2rem; border-radius: 99px; box-shadow: 0 10px 25px rgba(0,0,0,0.06); z-index: 3; display: flex; align-items: center; gap: 0.8rem; border: 1px solid rgba(0,0,0,0.03); animation: float 5s ease-in-out infinite;">
							<div style="width: 32px; height: 32px; background: rgba(74, 144, 226, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary);">
								<i class="ph-bold ph-shield-check"></i>
							</div>
							<span style="font-weight: 700; font-size: 0.9rem; color: var(--primary-dark);"><?php echo esc_html( $settings['badge1_text'] ); ?></span>
						</div>

						<div style="position: absolute; bottom: 25%; left: -5%; background: white; padding: 0.8rem 1.2rem; border-radius: 99px; box-shadow: 0 10px 25px rgba(0,0,0,0.06); z-index: 3; display: flex; align-items: center; gap: 0.8rem; border: 1px solid rgba(0,0,0,0.03); animation: float 6s ease-in-out infinite; animation-delay: 1s;">
							<div style="width: 32px; height: 32px; background: rgba(224, 159, 156, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--secondary);">
								<i class="ph-bold ph-house"></i>
							</div>
							<span style="font-weight: 700; font-size: 0.9rem; color: var(--primary-dark);"><?php echo esc_html( $settings['badge2_text'] ); ?></span>
						</div>
					</div>
					<div>
						<div style="margin-bottom: 3rem;">
							<div class="badge" style="background: rgba(74, 144, 226, 0.05); color: var(--primary); padding: 0.5rem 1rem; border-radius: 100px; font-weight: 700; font-size: 0.85rem; display: inline-block; margin-bottom: 1rem;">
								<?php echo esc_html( $settings['badge_text'] ); ?>
							</div>
							<h2 class="section-title" style="font-size: 3rem; margin-bottom: 1rem; line-height: 1.1; color: var(--primary-dark);">
								<?php echo wp_kses_post( $title ); ?>
							</h2>
							<p style="color: var(--text-muted); font-size: 1.15rem; line-height: 1.6;">
								<?php echo esc_html( $settings['description'] ); ?>
							</p>
						</div>
						<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
							<?php foreach ( $settings['features'] as $feature ) : ?>
								<div style="background: #f8fafc; padding: 1.8rem; border-radius: 20px; border: 1px solid #f1f5f9; transition: all 0.3s ease;">
									<i class="<?php echo esc_attr( $feature['feature_icon']['value'] ); ?>" style="font-size: 2.2rem; color: var(--primary); margin-bottom: 1rem; display: block;"></i>
									<h4 style="margin-bottom: 0.6rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif !important; font-weight: 700 !important; font-size: 1.25rem !important;"><?php echo esc_html( $feature['feature_title'] ); ?></h4>
									<p style="font-size: 0.95rem !important; color: var(--text-muted) !important; line-height: 1.6 !important; font-family: 'Inter', sans-serif !important; margin: 0;"><?php echo esc_html( $feature['feature_description'] ); ?></p>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
