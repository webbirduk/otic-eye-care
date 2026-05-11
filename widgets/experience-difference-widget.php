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
		<section class="why-choose-section">
			<div class="container">
				<div class="why-choose-grid">
					<div class="img-wrapper">
						<div class="circle-dashed"></div>
						<div class="circle-solid"></div>

						<div class="main-img-container">
							<img src="<?php echo esc_url( $settings['main_image']['url'] ); ?>" alt="Clinical Ear Wax Removal">
							<div class="img-overlay"></div>
						</div>

						<div class="stats-box">
							<div class="stars">
								<i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i>
							</div>
							<p class="stats-number"><?php echo esc_html( $settings['stats_number'] ); ?></p>
							<p class="stats-label"><?php echo esc_html( $settings['stats_label'] ); ?></p>
						</div>

						<div class="floating-badge badge-top">
							<div class="icon-box icon-shield">
								<i class="ph-bold ph-shield-check"></i>
							</div>
							<span><?php echo esc_html( $settings['badge1_text'] ); ?></span>
						</div>

						<div class="floating-badge badge-bottom">
							<div class="icon-box icon-house">
								<i class="ph-bold ph-house"></i>
							</div>
							<span><?php echo esc_html( $settings['badge2_text'] ); ?></span>
						</div>
					</div>

					<div>
						<div class="content-header">
							<div class="badge content-badge">
								<?php echo esc_html( $settings['badge_text'] ); ?>
							</div>
							<h2 class="section-title">
								<?php echo wp_kses_post( $title ); ?>
							</h2>
							<p class="section-description">
								<?php echo esc_html( $settings['description'] ); ?>
							</p>
						</div>
						<div class="features-grid">
							<?php foreach ( $settings['features'] as $feature ) : ?>
								<div class="feature-card">
									<i class="<?php echo esc_attr( $feature['feature_icon']['value'] ); ?> feature-icon"></i>
									<h4 class="feature-title"><?php echo esc_html( $feature['feature_title'] ); ?></h4>
									<p class="feature-desc"><?php echo esc_html( $feature['feature_description'] ); ?></p>
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
