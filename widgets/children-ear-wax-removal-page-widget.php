<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Children_Ear_Wax_Removal_Page_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_children_ear_wax_removal_page';
	}

	public function get_title() {
		return esc_html__( 'Otic Children’s Ear Wax Removal Page', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-document-file';
	}

	public function get_categories() {
		return [ 'otic-eye-care' ];
	}

	protected function register_controls() {

		// --- Hero Section ---
		$this->start_controls_section(
			'section_hero',
			[
				'label' => esc_html__( 'Hero Section', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'hero_badge',
			[
				'label' => 'Badge',
				'type' => Controls_Manager::TEXT,
				'default' => 'Specialist Paediatric Care',
			]
		);

		$this->add_control(
			'hero_title',
			[
				'label' => 'Title',
				'type' => Controls_Manager::TEXTAREA,
				'default' => "Children's [Ear Wax Removal] London",
			]
		);

		$this->add_control(
			'hero_desc',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Experience hospital-grade ear care in the comfort of your home. Our expert ENT Doctors are available 24/7 across London for safe, gentle microsuction.',
			]
		);

		$this->add_control(
			'video_url',
			[
				'label' => esc_html__( 'YouTube Video ID', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => '01iI_AIdEPA',
			]
		);

		$this->end_controls_section();

		// --- Expert Specialist Section ---
		$this->start_controls_section(
			'section_expert',
			[
				'label' => esc_html__( 'Elite Clinical Experience', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'expert_badge',
			[
				'label' => 'Badge',
				'type' => Controls_Manager::TEXT,
				'default' => 'Advanced Paediatrics',
			]
		);

		$this->add_control(
			'expert_title',
			[
				'label' => 'Title',
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Elite Clinical [Experience]',
			]
		);

		$this->add_control(
			'expert_desc',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Setting the global standard for in-home paediatric ear care across London.',
			]
		);

		$this->add_control(
			'paediatric_image',
			[
				'label' => 'Specialist Image',
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'http://otic-eye-care.local/wp-content/uploads/2026/05/paediatric_ear_care_specialist.png',
				],
			]
		);

		$this->add_control(
			'specialist_name',
			[
				'label' => 'Specialist Name',
				'type' => Controls_Manager::TEXT,
				'default' => 'Dr. Riaz Rampuri',
			]
		);

		$this->add_control(
			'specialist_creds',
			[
				'label' => 'Credentials',
				'type' => Controls_Manager::TEXT,
				'default' => 'MBBS, MRCS (ENT)',
			]
		);

		$this->add_control(
			'specialist_quote',
			[
				'label' => 'Quote',
				'type' => Controls_Manager::TEXTAREA,
				'default' => '"My mission is to provide the highest level of clinical excellence in a setting where children feel most at ease. With over a decade of specialist ENT experience, we ensure every procedure is precise, gentle, and child-focused."',
			]
		);

		$this->add_control(
			'specialist_verified_text',
			[
				'label' => 'Verified Text',
				'type' => Controls_Manager::TEXT,
				'default' => 'Verified Specialist',
			]
		);

		$this->add_control(
			'metric_1_val',
			[
				'label' => 'Metric 1 Value',
				'type' => Controls_Manager::TEXT,
				'default' => '2k+',
			]
		);

		$this->add_control(
			'metric_1_label',
			[
				'label' => 'Metric 1 Label',
				'type' => Controls_Manager::TEXT,
				'default' => 'Child Visits',
			]
		);

		$this->add_control(
			'metric_2_val',
			[
				'label' => 'Metric 2 Value',
				'type' => Controls_Manager::TEXT,
				'default' => '100%',
			]
		);

		$this->add_control(
			'metric_2_label',
			[
				'label' => 'Metric 2 Label',
				'type' => Controls_Manager::TEXT,
				'default' => 'Safety Record',
			]
		);

		$this->add_control(
			'sticker_text',
			[
				'label' => 'Sticker Text',
				'type' => Controls_Manager::TEXT,
				'default' => 'Specialist Baby Care',
			]
		);

		$this->end_controls_section();

		// --- Symptoms Section ---
		$this->start_controls_section(
			'section_symptoms',
			[
				'label' => esc_html__( 'Symptoms Grid', 'otic-eye-care' ),
			]
		);

		$repeater_symptoms = new Repeater();
		$repeater_symptoms->add_control( 'item_text', [ 'label' => 'Symptom', 'type' => Controls_Manager::TEXT ] );
		$repeater_symptoms->add_control( 'item_icon', [ 'label' => 'Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-duotone ph-warning-circle' ] ] );

		$this->add_control( 'symptoms_list', [
			'label' => 'Symptoms',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater_symptoms->get_controls(),
			'default' => [
				[ 'item_text' => 'Reduced hearing or difficulty hearing clearly', 'item_icon' => [ 'value' => 'ph-duotone ph-ear-slash' ] ],
				[ 'item_text' => 'Ear fullness or discomfort', 'item_icon' => [ 'value' => 'ph-duotone ph-waves' ] ],
				[ 'item_text' => 'Tugging or scratching at the ears', 'item_icon' => [ 'value' => 'ph-duotone ph-hand-pointing' ] ],
				[ 'item_text' => 'Irritability, especially during play or bedtime', 'item_icon' => [ 'value' => 'ph-duotone ph-smiley-sad' ] ],
				[ 'item_text' => 'Repeated ear infections or blocked hearing tests', 'item_icon' => [ 'value' => 'ph-duotone ph-first-aid-kit' ] ],
			],
			'title_field' => '{{{ item_text }}}',
		]);

		$this->end_controls_section();

		// --- Process Steps ---
		$this->start_controls_section(
			'section_process',
			[
				'label' => esc_html__( 'Appointment Process', 'otic-eye-care' ),
			]
		);

		$repeater_steps = new Repeater();
		$repeater_steps->add_control( 'step_title', [ 'label' => 'Title', 'type' => Controls_Manager::TEXT ] );
		$repeater_steps->add_control( 'step_desc', [ 'label' => 'Description', 'type' => Controls_Manager::TEXTAREA ] );
		$repeater_steps->add_control( 'step_icon', [ 'label' => 'Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-duotone ph-check-circle' ] ] );

		$this->add_control( 'steps', [
			'label' => 'Steps',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater_steps->get_controls(),
			'default' => [
				[ 'step_title' => 'History', 'step_desc' => 'Consultation to explore your ear symptoms', 'step_icon' => [ 'value' => 'ph-duotone ph-clipboard-text' ] ],
				[ 'step_title' => 'Consent', 'step_desc' => 'Explanation of procedure prior to examination', 'step_icon' => [ 'value' => 'ph-duotone ph-file-text' ] ],
				[ 'step_title' => 'Examination', 'step_desc' => 'Both ears will be examined using a microscope', 'step_icon' => [ 'value' => 'ph-duotone ph-microscope' ] ],
				[ 'step_title' => 'Procedure', 'step_desc' => 'If required, microsuction will be performed', 'step_icon' => [ 'value' => 'ph-duotone ph-needle' ] ],
				[ 'step_title' => 'Aftercare', 'step_desc' => 'Full guidance on post-treatment care', 'step_icon' => [ 'value' => 'ph-duotone ph-shield-check' ] ],
			],
			'title_field' => '{{{ step_title }}}',
		]);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_other_services',
			[
				'label' => 'Secondary Services',
			]
		);

		$this->add_control(
			'service_infection_image',
			[
				'label' => 'Infection Treatment Image',
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'http://otic-eye-care.local/wp-content/uploads/2026/05/paediatric_ear_infection_treatment.png',
				],
			]
		);

		$this->add_control(
			'service_foreign_image',
			[
				'label' => 'Foreign Body Image',
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'http://otic-eye-care.local/wp-content/uploads/2026/05/paediatric_foreign_body_removal.png',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_techniques',
			[
				'label' => 'Gentle Techniques',
			]
		);

		$this->add_control(
			'microsuction_image',
			[
				'label' => 'Microsuction Image',
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'http://otic-eye-care.local/wp-content/uploads/2026/05/microsuction_procedure_child.png',
				],
			]
		);

		$this->add_control(
			'microscopic_clarity_image',
			[
				'label' => 'Microscopic Clarity Image',
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'http://otic-eye-care.local/wp-content/uploads/2026/05/microscopic_ear_examination_child.png',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['hero_title'] );
		?>

		<style>
			.otic-page-container { font-family: 'Inter', sans-serif; overflow-x: hidden; }
			.container { max-width: 1200px; margin: 0 auto; padding: 0 20px; width: 100%; }
			.section-title { font-family: 'Outfit', sans-serif; font-weight: 800; color: #1e293b; line-height: 1.1; margin-bottom: 30px; font-size: clamp(2.5rem, 8vw, 3.5rem); letter-spacing: -0.02em; }
			.text-gradient { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
			.badge { display: inline-block; padding: 8px 20px; background: rgba(59, 130, 246, 0.08); color: #2563eb; border-radius: 99px; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 25px; border: 1px solid rgba(59, 130, 246, 0.1); }
			
			@keyframes flowLine { 0% { top: 0; opacity: 0; } 5% { opacity: 1; } 95% { opacity: 1; } 100% { top: 100%; opacity: 0; } }
			@keyframes drift { 0% { transform: translate(0, 0); } 50% { transform: translate(15px, -15px); } 100% { transform: translate(-10px, 10px); } }

			.symptom-card { background: white; padding: 30px; border-radius: 30px; border: 1px solid #f1f5f9; box-shadow: 0 10px 30px rgba(0,0,0,0.02); transition: all 0.3s ease; display: flex; align-items: center; gap: 20px; }
			.symptom-card:hover { transform: translateX(10px); border-color: #3b82f6; box-shadow: 0 15px 40px rgba(59, 130, 246, 0.05); }
			
			.process-card { background: white; padding: 45px; border-radius: 40px; border-left: 6px solid #3b82f6; box-shadow: 0 15px 50px rgba(0,0,0,0.03); transition: all 0.4s ease; }

			/* Responsive Utilities */
			@media (max-width: 1024px) {
				.hero-content { grid-template-columns: 1fr !important; gap: 60px !important; }
				.hero-text { text-align: center; }
				.hero-actions { justify-content: center; }
				.expert-grid { grid-template-columns: 1fr !important; gap: 80px !important; }
				.expert-grid > div:first-child {
					text-align: center !important;
					display: flex;
					flex-direction: column;
					align-items: center;
				}
				.solution-grid { grid-template-columns: 1fr !important; }
				.technique-grid { grid-template-columns: repeat(2, 1fr) !important; }
			}

			@media (max-width: 768px) {
				.section-title { font-size: 2.5rem !important; }
				.hero-title { font-size: 2.8rem !important; }
				.hero-desc { font-size: 1.1rem !important; }
				.symptom-grid { grid-template-columns: 1fr !important; }
				.technique-grid { grid-template-columns: 1fr !important; }
				
				/* Profile Card Mobile Adjustments */
				.profile-card { padding: 30px !important; border-radius: 30px !important; }
				.profile-name { font-size: 2rem !important; }
				
				/* Timeline Mobile Adjustments */
				.process-item { flex-direction: column !important; text-align: left !important; margin-bottom: 50px !important; padding-left: 60px !important; }
				.process-card-wrapper { width: 100% !important; order: 2 !important; text-align: left !important; }
				.process-icon-wrapper { 
					position: absolute !important; 
					left: 0 !important; 
					top: 0 !important;
					transform: none !important; 
					margin-bottom: 0 !important; 
					order: 1 !important; 
					width: 44px !important; 
					height: 44px !important; 
					font-size: 1.1rem !important;
				}
				.process-line { left: 22px !important; transform: none !important; }
				.process-card { border-left: 4px solid #3b82f6 !important; border-right: 0 !important; padding: 25px !important; border-radius: 20px !important; }
				.process-spacer { display: none !important; }
				
				/* Sticker & Metrics Mobile Redesign */
				.metric-container { 
					display: grid !important; 
					grid-template-columns: 1fr 1fr !important; 
					gap: 15px !important; 
					margin-top: 25px !important; 
					position: relative !important;
					width: 100% !important;
					z-index: 5 !important;
				}
				.floating-metric { 
					position: relative !important; 
					top: auto !important; 
					right: auto !important; 
					bottom: auto !important; 
					left: auto !important; 
					margin: 0 !important; 
					transform: none !important; 
					animation: none !important; 
					padding: 15px !important; 
					border-radius: 20px !important;
					background: #f8fafc !important;
					border: 1px solid #e2e8f0 !important;
					box-shadow: 0 4px 10px rgba(0,0,0,0.02) !important;
				}
				.floating-metric div:first-child { font-size: 1.5rem !important; }
				.floating-metric div:last-child { font-size: 0.65rem !important; }
				
				.clinical-sticker { 
					position: relative !important; 
					bottom: auto !important; 
					right: auto !important; 
					margin: 25px 0 !important; 
					display: flex !important; 
					justify-content: center !important;
					width: 100% !important;
					padding: 14px 20px !important;
					background: #3b82f6 !important;
					box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2) !important;
					border-radius: 15px !important;
					z-index: 5 !important;
				}

				.profile-card {
					margin-top: 25% !important;
					padding: 35px 25px !important;
					border-radius: 40px !important;
				}

				.verified-badge {
					display: flex !important;
					justify-content: center !important;
					width: 100% !important;
					margin-top: 0 !important;
					margin-bottom: 30px !important;
					position: relative !important;
					z-index: 6 !important;
				}
				
				.solution-panel { height: 500px !important; }
				.solution-overlay { padding: 25px !important; bottom: 15px !important; left: 15px !important; right: 15px !important; }
			}

			@media (max-width: 480px) {
				.section-title { font-size: 2rem !important; }
				.hero-title { font-size: 2.2rem !important; }
				.badge { padding: 6px 15px; font-size: 0.7rem; }
				.btn-lg { width: 100%; text-align: center; padding: 15px 25px !important; }
				.hero-actions { flex-direction: column; width: 100%; gap: 10px !important; }
				.profile-name { font-size: 1.8rem !important; }
			}
		</style>

		<div class="otic-page-container">
			<!-- Standardized Hero Section -->
			<section class="hero" id="children-wax-hero">
				<div class="hero-video-container">
					<iframe width="1214" height="683"
						src="https://www.youtube.com/embed/<?php echo esc_attr( $settings['video_url'] ); ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo esc_attr( $settings['video_url'] ); ?>&controls=0&rel=0&enablejsapi=1"
						frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
				<div class="hero-overlay"></div>
				<div class="container hero-content" style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 40px; align-items: center; position: relative; z-index: 10;">
					<div class="hero-text">
						<div class="badge">
							<i class="ph-fill ph-star"></i> <?php echo esc_html( $settings['hero_badge'] ); ?>
						</div>
						<h1 class="section-title hero-title" style="color: white; font-size: clamp(3rem, 10vw, 4.5rem);"><?php echo wp_kses_post( $title ); ?></h1>
						<p class="hero-desc" style="font-size: 1.5rem; line-height: 1.6; opacity: 0.9; margin-bottom: 40px; font-family: 'Inter'; font-weight: 400;">
							<?php echo esc_html( $settings['hero_desc'] ); ?>
						</p>
						<div class="hero-actions" style="display: flex; gap: 20px; flex-wrap: wrap;">
							<a href="#booking" class="btn btn-primary btn-lg">Book Now <i class="ph-bold ph-arrow-right"></i></a>
							<a href="#learn-more" class="btn btn-outline btn-lg" style="color: white; border-color: white;">Learn More</a>
						</div>
					</div>

					<div class="hero-form-card">
						<h3>Request Callback</h3>
						<form class="appointment-form">
							<div class="form-group"><input type="text" placeholder="Full Name" required></div>
							<div class="form-group"><input type="tel" placeholder="Phone Number" required></div>
							<div class="form-group"><input type="text" placeholder="London Postcode" required></div>
							<div class="form-group">
								<select required>
									<option value="" disabled selected>Select Treatment</option>
									<option value="wax" selected>Ear Wax Removal</option>
									<option value="infection">Ear Infection</option>
									<option value="foreign">Foreign Body Removal</option>
								</select>
							</div>
							<button type="submit" class="btn btn-primary">Request Callback <i class="ph-bold ph-paper-plane-tilt"></i></button>
						</form>
						<p class="hero-secure-text"><i class="ph-fill ph-shield-check"></i> Secure & Confidential</p>
					</div>
				</div>
			</section>

			<!-- Expert Paediatric Clinical Care: Immersive Dashboard Redesign -->
			<section style="padding: clamp(80px, 15vw, 180px) 0; background: #ffffff; position: relative; overflow: hidden;">
				<!-- Dynamic background gradients -->
				<div style="position: absolute; top: -10%; right: -5%; width: 800px; height: 800px; background: radial-gradient(circle, rgba(59, 130, 246, 0.04) 0%, transparent 70%); border-radius: 50%;"></div>
				<div style="position: absolute; bottom: -10%; left: -5%; width: 600px; height: 600px; background: radial-gradient(circle, rgba(96, 165, 250, 0.03) 0%, transparent 70%); border-radius: 50%;"></div>

				<div class="container" style="position: relative; z-index: 2;">
					<div style="text-align: center; margin-bottom: clamp(50px, 10vw, 90px);">
						<div class="badge" style="background: white; border-color: #e2e8f0;"><?php echo esc_html( $settings['expert_badge'] ); ?></div>
						<h2 class="section-title" style="font-size: clamp(2.5rem, 8vw, 4.5rem); margin-bottom: 20px;"><?php echo wp_kses_post( str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['expert_title'] ) ); ?></h2>
						<p style="font-family: 'Inter'; font-size: clamp(1.1rem, 3vw, 1.4rem); color: #64748b; max-width: 800px; margin: 0 auto;"><?php echo esc_html( $settings['expert_desc'] ); ?></p>
					</div>

					<div class="expert-grid" style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 80px; align-items: stretch;">
						<!-- Image and Floating Metrics Column -->
						<div style="position: relative;">
							<!-- Main Image Container -->
							<div style="position: relative; height: 100%; min-height: 400px; border-radius: 40px; overflow: hidden; box-shadow: 0 60px 120px rgba(0,0,0,0.1);">
								<img src="<?php echo esc_url( $settings['paediatric_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['specialist_name'] ); ?>" style="width: 100%; height: 100%; object-fit: cover; filter: saturate(1.1);">
								<div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(15, 23, 42, 0.4) 0%, transparent 40%);"></div>
							</div>

							<div class="metric-container">
								<!-- Floating Metric 01: Experience -->
								<div class="floating-metric" style="position: absolute; top: 40px; right: -30px; background: white; padding: 30px; border-radius: 30px; box-shadow: 0 30px 60px rgba(0,0,0,0.1); border: 1px solid #f1f5f9; text-align: center; animation: drift 6s infinite alternate; z-index: 10;">
									<div style="font-size: 3rem; font-family: 'Outfit'; font-weight: 800; color: #1e293b; line-height: 1;"><?php echo esc_html( $settings['metric_1_val'] ); ?></div>
									<div style="font-family: 'Inter'; font-size: 0.8rem; color: #64748b; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-top: 5px;"><?php echo esc_html( $settings['metric_1_label'] ); ?></div>
								</div>

								<!-- Floating Metric 02: Success Rate -->
								<div class="floating-metric" style="position: absolute; bottom: 80px; left: -40px; background: rgba(255,255,255,0.95); backdrop-filter: blur(20px); padding: 25px 35px; border-radius: 25px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); border: 1px solid rgba(255,255,255,0.5); animation: drift 8s infinite alternate-reverse; z-index: 10;">
									<div style="display: flex; align-items: center; gap: 15px;">
										<div style="width: 40px; height: 40px; background: #eff6ff; color: #3b82f6; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
											<i class="ph-fill ph-chart-line-up"></i>
										</div>
										<div>
											<div style="font-family: 'Outfit'; font-size: 1.5rem; font-weight: 800; color: #1e293b; line-height: 1;"><?php echo esc_html( $settings['metric_2_val'] ); ?></div>
											<div style="font-size: 0.8rem; color: #64748b; font-weight: 600;"><?php echo esc_html( $settings['metric_2_label'] ); ?></div>
										</div>
									</div>
								</div>
							</div>

							<!-- Clinical Sticker -->
							<div class="clinical-sticker" style="position: absolute; bottom: -20px; right: 20px; background: #3b82f6; color: white; padding: 15px 30px; border-radius: 15px; font-family: 'Outfit'; font-weight: 800; box-shadow: 0 15px 30px rgba(59, 130, 246, 0.3); z-index: 15;">
								<i class="ph-fill ph-heart" style="margin-right: 8px;"></i> <?php echo esc_html( $settings['sticker_text'] ); ?>
							</div>
						</div>

						<!-- Profile Column -->
						<div style="display: flex; flex-direction: column; justify-content: center;">
							<div class="profile-card" style="background: #0f172a; padding: 60px; border-radius: 60px; color: white; box-shadow: 0 40px 100px rgba(15, 23, 42, 0.15); position: relative; overflow: hidden; border: 1px solid rgba(255,255,255,0.05);">
								<!-- Glow Effect -->
								<div style="position: absolute; top: 0; right: 0; width: 200px; height: 200px; background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%); border-radius: 50%;"></div>
								
								<div class="verified-badge" style="display: inline-flex; align-items: center; gap: 12px; background: rgba(59, 130, 246, 0.15); color: #60a5fa; padding: 10px 25px; border-radius: 99px; font-family: 'Outfit'; font-weight: 800; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 35px; border: 1px solid rgba(59, 130, 246, 0.2);">
									<i class="ph-fill ph-seal-check"></i> <?php echo esc_html( $settings['specialist_verified_text'] ); ?>
								</div>
								
								<h3 class="profile-name" style="font-family: 'Outfit'; font-size: 2.8rem; color: white; margin-bottom: 20px; line-height: 1.1;"><?php echo esc_html( $settings['specialist_name'] ); ?> <br><span style="font-size: 1.2rem; color: #94a3b8; font-weight: 400; font-family: 'Inter';"><?php echo esc_html( $settings['specialist_creds'] ); ?></span></h3>
								
								<p style="font-size: 1.25rem; line-height: 1.8; color: #94a3b8; font-family: 'Inter'; margin-bottom: 45px;">
									<?php echo esc_html( $settings['specialist_quote'] ); ?>
								</p>

								<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
									<div style="background: rgba(255,255,255,0.03); padding: 25px; border-radius: 25px; border: 1px solid rgba(255,255,255,0.05);">
										<div style="font-family: 'Outfit'; color: white; font-weight: 700; margin-bottom: 5px;">DBS Verified</div>
										<div style="font-size: 0.85rem; color: #64748b;">Enhanced Disclosure</div>
									</div>
									<div style="background: rgba(255,255,255,0.03); padding: 25px; border-radius: 25px; border: 1px solid rgba(255,255,255,0.05);">
										<div style="font-family: 'Outfit'; color: white; font-weight: 700; margin-bottom: 5px;">CQC Registered</div>
										<div style="font-size: 0.85rem; color: #64748b;">Clinical Excellence</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Symptoms Section -->
			<section style="padding: clamp(60px, 10vw, 140px) 0; background: #f8fafc; position: relative; overflow: hidden;">
				<div class="container">
					<div style="text-align: center; margin-bottom: 60px;">
						<div class="badge">When to Act</div>
						<h2 class="section-title">Why Children Need <span class="text-gradient">Removal</span></h2>
						<p style="font-family: 'Inter'; font-size: 1.2rem; color: #64748b; max-width: 800px; margin: 0 auto;">Routine ear wax often clears itself, but build-up can interfere with speech development and concentration.</p>
					</div>
					<div class="symptom-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; max-width: 1000px; margin: 0 auto;">
						<?php foreach ( $settings['symptoms_list'] as $symptom ) : ?>
							<div class="symptom-card">
								<div style="width: 48px; height: 48px; background: #eff6ff; color: #3b82f6; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; flex-shrink: 0;">
									<i class="<?php echo esc_attr( $symptom['item_icon']['value'] ); ?>"></i>
								</div>
								<span style="font-family: 'Outfit'; font-weight: 700; font-size: 1rem; color: #1e293b;"><?php echo esc_html( $symptom['item_text'] ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>			<!-- Appointment Journey -->
			<section style="padding: clamp(60px, 10vw, 140px) 0; background: #ffffff;">
				<div class="container">
					<div style="text-align: center; margin-bottom: 60px;">
						<div class="badge">Clinical Process</div>
						<h2 class="section-title">At Your Child's <span class="text-gradient">Appointment</span></h2>
					</div>
					<div style="max-width: 900px; margin: 0 auto; position: relative;">
						<div class="process-line" style="position: absolute; top: 0; bottom: 0; left: 50%; width: 2px; background: linear-gradient(to bottom, transparent, #e2e8f0 15%, #e2e8f0 85%, transparent); transform: translateX(-50%);">
							<div style="position: absolute; width: 10px; height: 10px; background: #3b82f6; border-radius: 50%; left: 50%; transform: translateX(-50%); box-shadow: 0 0 15px #3b82f6; animation: flowLine 4s infinite linear;"></div>
						</div>
						<?php foreach ( $settings['steps'] as $index => $step ) : 
							$is_even = ($index % 2 === 0);
						?>
							<div class="process-item" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: clamp(40px, 8vw, 80px); position: relative;">
								<div class="process-card-wrapper" style="width: 42%; <?php echo $is_even ? 'text-align: right;' : 'order: 2; text-align: left;'; ?>">
									<div class="process-card" style="<?php echo $is_even ? 'border-left: 0; border-right: 6px solid #3b82f6;' : ''; ?>">
										<h3 style="font-family: 'Outfit'; font-size: 1.5rem; color: #1e293b; margin-bottom: 10px;"><?php echo esc_html( $step['step_title'] ); ?></h3>
										<p style="font-family: 'Inter'; color: #64748b; line-height: 1.6; margin: 0; font-size: 0.95rem;"><?php echo esc_html( $step['step_desc'] ); ?></p>
									</div>
								</div>
								<div class="process-icon-wrapper" style="width: 60px; height: 60px; background: white; border: 2px solid #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: absolute; left: 50%; transform: translateX(-50%); z-index: 5; color: #3b82f6; font-size: 1.5rem; box-shadow: 0 10px 25px rgba(0,0,0,0.05);">
									<i class="<?php echo esc_attr( $step['step_icon']['value'] ); ?>"></i>
								</div>
								<div style="width: 42%;" class="process-spacer"></div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<!-- Gentle Techniques: Clinical Methodology Showcase -->
			<section style="padding: clamp(60px, 12vw, 160px) 0; background: #f8fbff; position: relative; overflow: hidden;">
				<!-- Decorative background element -->
				<div style="position: absolute; top: -100px; right: -100px; width: 400px; height: 400px; background: rgba(59, 130, 246, 0.03); border-radius: 50%; blur: 80px;"></div>
				
				<div class="container">
					<div style="text-align: center; margin-bottom: clamp(50px, 8vw, 90px);">
						<div class="badge">Advanced Methodology</div>
						<h2 class="section-title">Gentle Techniques for <span class="text-gradient">Little Ears</span></h2>
						<p style="font-family: 'Inter'; font-size: 1.2rem; color: #64748b; max-width: 800px; margin: 0 auto;">
							Paediatric ear wax removal requires specialized tools and a gentle, reassuring touch. We utilize the most advanced non-invasive techniques.
						</p>
					</div>

					<div class="technique-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; align-items: stretch;">
						<!-- Technique 01 -->
						<div class="technique-card" style="background: white; padding: 0; border-radius: 30px; border: 1px solid #f1f5f9; box-shadow: 0 20px 50px rgba(0,0,0,0.03); transition: all 0.4s ease; overflow: hidden;" onmouseover="this.style.transform='translateY(-15px)'; this.style.borderColor='#3b82f6'; this.style.boxShadow='0 40px 80px rgba(59, 130, 246, 0.08)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#f1f5f9'; this.style.boxShadow='0 20px 50px rgba(0,0,0,0.03)';">
							<div style="height: 200px; overflow: hidden; position: relative;">
								<img src="<?php echo esc_url( $settings['microsuction_image']['url'] ); ?>" alt="Microsuction" style="width: 100%; height: 100%; object-fit: cover;">
								<div style="position: absolute; top: 15px; right: 15px; width: 44px; height: 44px; background: rgba(255,255,255,0.9); backdrop-filter: blur(10px); color: #3b82f6; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
									<i class="ph-bold ph-needle"></i>
								</div>
							</div>
							<div style="padding: 30px;">
								<h4 style="font-family: 'Outfit'; font-size: 1.5rem; color: #1e293b; margin-bottom: 15px;">Microsuction</h4>
								<p style="color: #64748b; line-height: 1.7; margin: 0; font-size: 0.95rem;">
									A precise, gentle method that uses light suction to remove wax. No water pressure is involved, making it the safest option for small, sensitive ear canals.
								</p>
							</div>
						</div>

						<!-- Technique 02 -->
						<div class="technique-card" style="background: white; padding: 0; border-radius: 30px; border: 1px solid #f1f5f9; box-shadow: 0 20px 50px rgba(0,0,0,0.03); transition: all 0.4s ease; overflow: hidden;" onmouseover="this.style.transform='translateY(-15px)'; this.style.borderColor='#3b82f6'; this.style.boxShadow='0 40px 80px rgba(59, 130, 246, 0.08)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#f1f5f9'; this.style.boxShadow='0 20px 50px rgba(0,0,0,0.03)';">
							<div style="height: 200px; overflow: hidden; position: relative;">
								<img src="<?php echo esc_url( $settings['microscopic_clarity_image']['url'] ); ?>" alt="Microscopic Clarity" style="width: 100%; height: 100%; object-fit: cover;">
								<div style="position: absolute; top: 15px; right: 15px; width: 44px; height: 44px; background: rgba(255,255,255,0.9); backdrop-filter: blur(10px); color: #10b981; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
									<i class="ph-bold ph-eye"></i>
								</div>
							</div>
							<div style="padding: 30px;">
								<h4 style="font-family: 'Outfit'; font-size: 1.5rem; color: #1e293b; margin-bottom: 15px;">Microscopic Clarity</h4>
								<p style="color: #64748b; line-height: 1.7; margin: 0; font-size: 0.95rem;">
									We use high-magnification surgical loupes or microscopes during every procedure to ensure total visibility and absolute safety for your child.
								</p>
							</div>
						</div>

						<!-- Positive Experience Feature -->
						<div style="background: #0f172a; padding: 40px; border-radius: 30px; color: white; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden;">
							<div style="position: absolute; bottom: -20px; right: -20px; font-size: 8rem; color: rgba(59, 130, 246, 0.05); pointer-events: none;">
								<i class="ph-fill ph-heart"></i>
							</div>
							<div>
								<div style="font-family: 'Outfit'; font-size: 0.8rem; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; color: #3b82f6; margin-bottom: 15px;">The Experience</div>
								<h4 style="font-family: 'Outfit'; font-size: 1.5rem; margin-bottom: 20px; line-height: 1.2;">Making Visits <span class="text-gradient">Stress-Free</span></h4>
								<p style="color: #94a3b8; line-height: 1.7; margin: 0; font-size: 0.95rem;">
									From animal stickers and balloons to multimedia entertainment, we focus on making the appointment a positive, rewarding memory for your child.
								</p>
							</div>
							<div style="margin-top: 30px; display: flex; align-items: center; gap: 15px;">
								<div style="width: 32px; height: 32px; background: #3b82f6; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 0.8rem;">
									<i class="ph-bold ph-check"></i>
								</div>
								<span style="font-family: 'Outfit'; font-weight: 700; font-size: 0.9rem;">Child-Friendly Care</span>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Emergency Section -->
			<section style="padding: clamp(60px, 10vw, 120px) 0; background: #fef2f2;">
				<div class="container">
					<div style="max-width: 900px; margin: 0 auto; text-align: center; background: white; padding: clamp(40px, 8vw, 80px); border-radius: clamp(30px, 6vw, 60px); border: 1px solid rgba(239, 68, 68, 0.1); box-shadow: 0 20px 60px rgba(239, 68, 68, 0.05);">
						<div style="width: clamp(60px, 10vw, 80px); height: clamp(60px, 10vw, 80px); background: #fef2f2; color: #ef4444; border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 30px;">
							<i class="ph-bold ph-clock"></i>
						</div>
						<h2 class="section-title" style="font-size: clamp(2rem, 6vw, 3rem);">Emergency <span style="color: #ef4444;">Paediatric</span> Care</h2>
						<p style="font-size: clamp(1rem, 3vw, 1.25rem); line-height: 1.8; color: #64748b; font-family: 'Inter'; margin-bottom: 40px;">
							Available between 7:00pm and 7:00am daily for children experiencing sudden ear pain or situations where urgent care is required.
						</p>
						<div style="display: flex; justify-content: center; gap: 20px;">
							<a href="tel:+447539248324" class="btn btn-primary btn-lg" style="background: #ef4444; border-color: #ef4444; padding: 20px 40px; border-radius: 20px; font-family: 'Outfit'; font-weight: 800; display: inline-flex; align-items: center; justify-content: center; gap: 10px; color: white; text-decoration: none;">
								Call Now <i class="ph-bold ph-phone"></i>
							</a>
						</div>
					</div>
				</div>
			</section>

			<!-- Specialized Paediatric Solutions: Elite Dashboard Redesign -->
			<section style="padding: clamp(80px, 15vw, 180px) 0; background: #0f172a; color: white; position: relative; overflow: hidden;">
				<!-- Dynamic clinical glow -->
				<div style="position: absolute; top: -10%; left: -10%; width: 800px; height: 800px; background: radial-gradient(circle, rgba(59, 130, 246, 0.08) 0%, transparent 70%); border-radius: 50%;"></div>
				
				<div class="container" style="position: relative; z-index: 2;">
					<div style="text-align: center; margin-bottom: clamp(60px, 10vw, 100px);">
						<div class="badge" style="background: rgba(255,255,255,0.1); color: white; border-color: rgba(255,255,255,0.2);">Comprehensive Care</div>
						<h2 class="section-title" style="color: white; font-size: clamp(2.5rem, 8vw, 4.8rem); letter-spacing: -0.04em;">Specialized Paediatric <br><span class="text-gradient">Clinical Solutions</span></h2>
						<p style="font-family: 'Inter'; font-size: clamp(1.1rem, 3vw, 1.4rem); color: #94a3b8; max-width: 800px; margin: 0 auto;">
							Expert clinical care beyond wax removal, delivering hospital-grade ENT excellence directly to your home.
						</p>
					</div>

					<div class="solution-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: clamp(30px, 6vw, 60px);">
						<!-- Solution 01: Ear Infection -->
						<div class="solution-panel" style="position: relative; height: clamp(500px, 70vh, 700px); border-radius: clamp(30px, 6vw, 60px); overflow: hidden; box-shadow: 0 40px 100px rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.05); transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);" onmouseover="this.style.transform='translateY(-20px)';" onmouseout="this.style.transform='translateY(0)';">
							<img src="<?php echo esc_url( $settings['service_infection_image']['url'] ); ?>" alt="Paediatric Ear Infection" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7;">
							
							<!-- Glass Overlay -->
							<div class="solution-overlay" style="position: absolute; bottom: 40px; left: 40px; right: 40px; background: rgba(15, 23, 42, 0.8); backdrop-filter: blur(20px); padding: clamp(30px, 5vw, 50px); border-radius: clamp(25px, 4vw, 45px); border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
								<div style="width: 44px; height: 44px; background: #3b82f6; color: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 20px;">
									<i class="ph-fill ph-first-aid"></i>
								</div>
								<h3 style="font-family: 'Outfit'; font-size: clamp(1.5rem, 4vw, 2.2rem); color: white; margin-bottom: 15px; line-height: 1.1;">Ear Infection <br><span class="text-gradient">Clinical Care</span></h3>
								<p style="color: #94a3b8; line-height: 1.8; font-size: 1rem; margin-bottom: 25px;">
									Expert assessment for acute pain, discharge, or swimmer's ear, with immediate clinical guidance and home-visit management.
								</p>
								<a href="#" style="font-family: 'Outfit'; font-weight: 800; color: #3b82f6; text-decoration: none; display: flex; align-items: center; gap: 10px; font-size: 1rem; text-transform: uppercase; letter-spacing: 1px;">
									Learn More <i class="ph-bold ph-arrow-right"></i>
								</a>
							</div>
						</div>

						<!-- Solution 02: Foreign Body -->
						<div class="solution-panel" style="position: relative; height: clamp(500px, 70vh, 700px); border-radius: clamp(30px, 6vw, 60px); overflow: hidden; box-shadow: 0 40px 100px rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.05); transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);" onmouseover="this.style.transform='translateY(-20px)';" onmouseout="this.style.transform='translateY(0)';">
							<img src="<?php echo esc_url( $settings['service_foreign_image']['url'] ); ?>" alt="Paediatric Foreign Body" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7;">
							
							<!-- Glass Overlay -->
							<div class="solution-overlay" style="position: absolute; bottom: 40px; left: 40px; right: 40px; background: rgba(15, 23, 42, 0.8); backdrop-filter: blur(20px); padding: clamp(30px, 5vw, 50px); border-radius: clamp(25px, 4vw, 45px); border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
								<div style="width: 44px; height: 44px; background: #60a5fa; color: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 20px;">
									<i class="ph-fill ph-magnifying-glass"></i>
								</div>
								<h3 style="font-family: 'Outfit'; font-size: clamp(1.5rem, 4vw, 2.2rem); color: white; margin-bottom: 15px; line-height: 1.1;">Foreign Body <br><span class="text-gradient">Expert Removal</span></h3>
								<p style="color: #94a3b8; line-height: 1.8; font-size: 1rem; margin-bottom: 25px;">
									Safe extraction of beads, food, or toys using precise clinical tools in a calm, child-friendly environment at your home.
								</p>
								<a href="#" style="font-family: 'Outfit'; font-weight: 800; color: #60a5fa; text-decoration: none; display: flex; align-items: center; gap: 10px; font-size: 1rem; text-transform: uppercase; letter-spacing: 1px;">
									Learn More <i class="ph-bold ph-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<?php
	}
}
