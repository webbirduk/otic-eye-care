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

		$this->add_control(
			'paediatric_image',
			[
				'label' => 'Paediatric Image',
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'http://otic-eye-care.local/wp-content/uploads/2026/05/paediatric_ear_care_specialist.png',
				],
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

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['hero_title'] );
		?>

		<style>
			.otic-page-container { font-family: 'Inter', sans-serif; }
			.section-title { font-family: 'Outfit', sans-serif; font-weight: 800; color: #1e293b; line-height: 1.1; margin-bottom: 30px; font-size: 3.5rem; letter-spacing: -0.02em; }
			.text-gradient { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
			.badge { display: inline-block; padding: 8px 20px; background: rgba(59, 130, 246, 0.08); color: #2563eb; border-radius: 99px; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 25px; border: 1px solid rgba(59, 130, 246, 0.1); }
			
			@keyframes flowLine { 0% { top: 0; opacity: 0; } 5% { opacity: 1; } 95% { opacity: 1; } 100% { top: 100%; opacity: 0; } }
			@keyframes drift { 0% { transform: translate(0, 0); } 50% { transform: translate(15px, -15px); } 100% { transform: translate(-10px, 10px); } }

			.symptom-card { background: white; padding: 30px; border-radius: 30px; border: 1px solid #f1f5f9; box-shadow: 0 10px 30px rgba(0,0,0,0.02); transition: all 0.3s ease; display: flex; align-items: center; gap: 20px; }
			.symptom-card:hover { transform: translateX(10px); border-color: #3b82f6; box-shadow: 0 15px 40px rgba(59, 130, 246, 0.05); }
			
			.process-card { background: white; padding: 45px; border-radius: 40px; border-left: 6px solid #3b82f6; box-shadow: 0 15px 50px rgba(0,0,0,0.03); transition: all 0.4s ease; }
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
				<div class="container hero-content">
					<div class="hero-text">
						<div class="badge">
							<i class="ph-fill ph-star"></i> <?php echo esc_html( $settings['hero_badge'] ); ?>
						</div>
						<h1 class="section-title" style="color: white; font-size: 4.5rem;"><?php echo wp_kses_post( $title ); ?></h1>
						<p style="font-size: 1.5rem; line-height: 1.6; opacity: 0.9; margin-bottom: 40px; font-family: 'Inter'; font-weight: 400;">
							<?php echo esc_html( $settings['hero_desc'] ); ?>
						</p>
						<div class="hero-actions">
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
			<section style="padding: 180px 0; background: #ffffff; position: relative; overflow: hidden;">
				<!-- Dynamic background gradients -->
				<div style="position: absolute; top: -10%; right: -5%; width: 800px; height: 800px; background: radial-gradient(circle, rgba(59, 130, 246, 0.04) 0%, transparent 70%); border-radius: 50%;"></div>
				<div style="position: absolute; bottom: -10%; left: -5%; width: 600px; height: 600px; background: radial-gradient(circle, rgba(96, 165, 250, 0.03) 0%, transparent 70%); border-radius: 50%;"></div>

				<div class="container" style="position: relative; z-index: 2;">
					<div style="text-align: center; margin-bottom: 90px;">
						<div class="badge" style="background: white; border-color: #e2e8f0;">Advanced Paediatrics</div>
						<h2 class="section-title" style="font-size: 4.5rem; margin-bottom: 20px;">Elite Clinical <span class="text-gradient">Experience</span></h2>
						<p style="font-family: 'Inter'; font-size: 1.4rem; color: #64748b; max-width: 800px; margin: 0 auto;">Setting the global standard for in-home paediatric ear care across London.</p>
					</div>

					<div style="display: grid; grid-template-columns: 0.9fr 1.1fr; gap: 80px; align-items: stretch;">
						<!-- Profile Column -->
						<div style="display: flex; flex-direction: column; justify-content: center;">
							<div style="background: #0f172a; padding: 60px; border-radius: 60px; color: white; box-shadow: 0 40px 100px rgba(15, 23, 42, 0.15); position: relative; overflow: hidden; border: 1px solid rgba(255,255,255,0.05);">
								<!-- Glow Effect -->
								<div style="position: absolute; top: 0; right: 0; width: 200px; height: 200px; background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%); border-radius: 50%;"></div>
								
								<div style="display: inline-flex; align-items: center; gap: 12px; background: rgba(59, 130, 246, 0.15); color: #60a5fa; padding: 10px 25px; border-radius: 99px; font-family: 'Outfit'; font-weight: 800; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 35px; border: 1px solid rgba(59, 130, 246, 0.2);">
									<i class="ph-fill ph-seal-check"></i> Verified Specialist
								</div>
								
								<h3 style="font-family: 'Outfit'; font-size: 2.8rem; color: white; margin-bottom: 20px; line-height: 1.1;">Dr. Riaz Rampuri <br><span style="font-size: 1.2rem; color: #94a3b8; font-weight: 400; font-family: 'Inter';">MBBS, MRCS (ENT)</span></h3>
								
								<p style="font-size: 1.25rem; line-height: 1.8; color: #94a3b8; font-family: 'Inter'; margin-bottom: 45px;">
									"My mission is to provide the highest level of clinical excellence in a setting where children feel most at ease. With over a decade of specialist ENT experience, we ensure every procedure is precise, gentle, and child-focused."
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

						<!-- Image and Floating Metrics Column -->
						<div style="position: relative;">
							<!-- Main Image Container -->
							<div style="position: relative; height: 100%; border-radius: 80px; overflow: hidden; box-shadow: 0 60px 120px rgba(0,0,0,0.1);">
								<img src="<?php echo esc_url( $settings['paediatric_image']['url'] ); ?>" alt="Paediatric Specialist" style="width: 100%; height: 100%; object-fit: cover; filter: saturate(1.1);">
								<div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(15, 23, 42, 0.4) 0%, transparent 40%);"></div>
							</div>

							<!-- Floating Metric 01: Experience -->
							<div style="position: absolute; top: 40px; right: -30px; background: white; padding: 40px; border-radius: 40px; box-shadow: 0 30px 60px rgba(0,0,0,0.1); border: 1px solid #f1f5f9; text-align: center; animation: drift 6s infinite alternate;">
								<div style="font-size: 4rem; font-family: 'Outfit'; font-weight: 800; color: #1e293b; line-height: 1;">2k<span style="color: #3b82f6;">+</span></div>
								<div style="font-family: 'Inter'; font-size: 1rem; color: #64748b; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-top: 5px;">Child Visits</div>
							</div>

							<!-- Floating Metric 02: Success Rate -->
							<div style="position: absolute; bottom: 80px; left: -40px; background: rgba(255,255,255,0.95); backdrop-filter: blur(20px); padding: 30px 45px; border-radius: 35px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); border: 1px solid rgba(255,255,255,0.5); animation: drift 8s infinite alternate-reverse;">
								<div style="display: flex; align-items: center; gap: 20px;">
									<div style="width: 50px; height: 50px; background: #eff6ff; color: #3b82f6; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
										<i class="ph-fill ph-chart-line-up"></i>
									</div>
									<div>
										<div style="font-family: 'Outfit'; font-size: 1.8rem; font-weight: 800; color: #1e293b; line-height: 1;">100%</div>
										<div style="font-size: 0.9rem; color: #64748b; font-weight: 600;">Safety Record</div>
									</div>
								</div>
							</div>

							<!-- Clinical Sticker -->
							<div style="position: absolute; bottom: -20px; right: 40px; background: #3b82f6; color: white; padding: 20px 35px; border-radius: 20px; font-family: 'Outfit'; font-weight: 800; box-shadow: 0 15px 30px rgba(59, 130, 246, 0.3); z-index: 5;">
								<i class="ph-fill ph-heart" style="margin-right: 8px;"></i> Specialist Baby Care
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Symptoms Section -->
			<section style="padding: 140px 0; background: #f8fafc; position: relative; overflow: hidden;">
				<div class="container">
					<div style="text-align: center; margin-bottom: 80px;">
						<div class="badge">When to Act</div>
						<h2 class="section-title">Why Children Need <span class="text-gradient">Removal</span></h2>
						<p style="font-family: 'Inter'; font-size: 1.25rem; color: #64748b; max-width: 800px; margin: 0 auto;">Routine ear wax often clears itself, but build-up can interfere with speech development and concentration.</p>
					</div>
					<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 25px; max-width: 1000px; margin: 0 auto;">
						<?php foreach ( $settings['symptoms_list'] as $symptom ) : ?>
							<div class="symptom-card">
								<div style="width: 56px; height: 56px; background: #eff6ff; color: #3b82f6; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0;">
									<i class="<?php echo esc_attr( $symptom['item_icon']['value'] ); ?>"></i>
								</div>
								<span style="font-family: 'Outfit'; font-weight: 700; font-size: 1.1rem; color: #1e293b;"><?php echo esc_html( $symptom['item_text'] ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<!-- Appointment Journey -->
			<section style="padding: 140px 0; background: #ffffff;">
				<div class="container">
					<div style="text-align: center; margin-bottom: 100px;">
						<div class="badge">Clinical Process</div>
						<h2 class="section-title">At Your Child's <span class="text-gradient">Appointment</span></h2>
					</div>
					<div style="max-width: 900px; margin: 0 auto; position: relative;">
						<div style="position: absolute; top: 0; bottom: 0; left: 50%; width: 2px; background: linear-gradient(to bottom, transparent, #e2e8f0 15%, #e2e8f0 85%, transparent); transform: translateX(-50%);">
							<div style="position: absolute; width: 10px; height: 10px; background: #3b82f6; border-radius: 50%; left: 50%; transform: translateX(-50%); box-shadow: 0 0 15px #3b82f6; animation: flowLine 4s infinite linear;"></div>
						</div>
						<?php foreach ( $settings['steps'] as $index => $step ) : 
							$is_even = ($index % 2 === 0);
						?>
							<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 80px; position: relative;">
								<div style="width: 42%; <?php echo $is_even ? 'text-align: right;' : 'order: 2; text-align: left;'; ?>">
									<div class="process-card" style="<?php echo $is_even ? 'border-left: 0; border-right: 6px solid #3b82f6;' : ''; ?>">
										<h3 style="font-family: 'Outfit'; font-size: 1.8rem; color: #1e293b; margin-bottom: 10px;"><?php echo esc_html( $step['step_title'] ); ?></h3>
										<p style="font-family: 'Inter'; color: #64748b; line-height: 1.6; margin: 0;"><?php echo esc_html( $step['step_desc'] ); ?></p>
									</div>
								</div>
								<div style="width: 80px; height: 80px; background: white; border: 2px solid #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: absolute; left: 50%; transform: translateX(-50%); z-index: 5; color: #3b82f6; font-size: 2.2rem; box-shadow: 0 10px 25px rgba(0,0,0,0.05);">
									<i class="<?php echo esc_attr( $step['step_icon']['value'] ); ?>"></i>
								</div>
								<div style="width: 42%;"></div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>			<!-- Gentle Techniques: Clinical Methodology Showcase -->
			<section style="padding: 160px 0; background: #f8fbff; position: relative; overflow: hidden;">
				<!-- Decorative background element -->
				<div style="position: absolute; top: -100px; right: -100px; width: 400px; height: 400px; background: rgba(59, 130, 246, 0.03); border-radius: 50%; blur: 80px;"></div>
				
				<div class="container">
					<div style="text-align: center; margin-bottom: 90px;">
						<div class="badge">Advanced Methodology</div>
						<h2 class="section-title">Gentle Techniques for <span class="text-gradient">Little Ears</span></h2>
						<p style="font-family: 'Inter'; font-size: 1.3rem; color: #64748b; max-width: 800px; margin: 0 auto;">
							Paediatric ear wax removal requires specialized tools and a gentle, reassuring touch. We utilize the most advanced non-invasive techniques.
						</p>
					</div>

					<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; align-items: stretch;">
						<!-- Technique 01 -->
						<div class="technique-card" style="background: white; padding: 50px; border-radius: 50px; border: 1px solid #f1f5f9; box-shadow: 0 20px 50px rgba(0,0,0,0.03); transition: all 0.4s ease;" onmouseover="this.style.transform='translateY(-15px)'; this.style.borderColor='#3b82f6'; this.style.boxShadow='0 40px 80px rgba(59, 130, 246, 0.08)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#f1f5f9'; this.style.boxShadow='0 20px 50px rgba(0,0,0,0.03)';">
							<div style="width: 70px; height: 70px; background: #eff6ff; color: #3b82f6; border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin-bottom: 35px;">
								<i class="ph-bold ph-needle"></i>
							</div>
							<h4 style="font-family: 'Outfit'; font-size: 1.8rem; color: #1e293b; margin-bottom: 20px;">Microsuction</h4>
							<p style="color: #64748b; line-height: 1.8; margin: 0;">
								A precise, gentle method that uses light suction to remove wax. No water pressure is involved, making it the safest option for small, sensitive ear canals.
							</p>
						</div>

						<!-- Technique 02 -->
						<div class="technique-card" style="background: white; padding: 50px; border-radius: 50px; border: 1px solid #f1f5f9; box-shadow: 0 20px 50px rgba(0,0,0,0.03); transition: all 0.4s ease;" onmouseover="this.style.transform='translateY(-15px)'; this.style.borderColor='#3b82f6'; this.style.boxShadow='0 40px 80px rgba(59, 130, 246, 0.08)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#f1f5f9'; this.style.boxShadow='0 20px 50px rgba(0,0,0,0.03)';">
							<div style="width: 70px; height: 70px; background: #f0fdf4; color: #10b981; border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin-bottom: 35px;">
								<i class="ph-bold ph-eye"></i>
							</div>
							<h4 style="font-family: 'Outfit'; font-size: 1.8rem; color: #1e293b; margin-bottom: 20px;">Microscopic Clarity</h4>
							<p style="color: #64748b; line-height: 1.8; margin: 0;">
								We use high-magnification surgical loupes or microscopes during every procedure to ensure total visibility and absolute safety for your child.
							</p>
						</div>

						<!-- Positive Experience Feature -->
						<div style="background: #0f172a; padding: 50px; border-radius: 50px; color: white; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden;">
							<div style="position: absolute; bottom: -20px; right: -20px; font-size: 12rem; color: rgba(59, 130, 246, 0.05); pointer-events: none;">
								<i class="ph-fill ph-heart"></i>
							</div>
							<div>
								<div style="font-family: 'Outfit'; font-size: 0.9rem; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; color: #3b82f6; margin-bottom: 20px;">The Experience</div>
								<h4 style="font-family: 'Outfit'; font-size: 1.8rem; margin-bottom: 25px; line-height: 1.2;">Making Visits <span class="text-gradient">Stress-Free</span></h4>
								<p style="color: #94a3b8; line-height: 1.7; margin: 0; font-size: 1.05rem;">
									From animal stickers and balloons to multimedia entertainment, we focus on making the appointment a positive, rewarding memory for your child.
								</p>
							</div>
							<div style="margin-top: 30px; display: flex; align-items: center; gap: 15px;">
								<div style="width: 40px; height: 40px; background: #3b82f6; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
									<i class="ph-bold ph-check"></i>
								</div>
								<span style="font-family: 'Outfit'; font-weight: 700;">Child-Friendly Care</span>
							</div>
						</div>
					</div>
				</div>
			</section>
>

			<!-- Emergency Section -->
			<section style="padding: 120px 0; background: #fef2f2;">
				<div class="container">
					<div style="max-width: 900px; margin: 0 auto; text-align: center; background: white; padding: 80px; border-radius: 60px; border: 1px solid rgba(239, 68, 68, 0.1); box-shadow: 0 20px 60px rgba(239, 68, 68, 0.05);">
						<div style="width: 80px; height: 80px; background: #fef2f2; color: #ef4444; border-radius: 25px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 30px;">
							<i class="ph-bold ph-clock"></i>
						</div>
						<h2 class="section-title" style="font-size: 3rem;">Emergency <span style="color: #ef4444;">Paediatric</span> Care</h2>
						<p style="font-size: 1.25rem; line-height: 1.8; color: #64748b; font-family: 'Inter'; margin-bottom: 40px;">
							Available between 7:00pm and 7:00am daily for children experiencing sudden ear pain or situations where urgent care is required.
						</p>
						<div style="display: flex; justify-content: center; gap: 20px;">
							<a href="tel:+447539248324" class="btn btn-primary" style="background: #ef4444; border-color: #ef4444; padding: 20px 40px; border-radius: 20px; font-family: 'Outfit'; font-weight: 800; display: inline-flex; align-items: center; gap: 10px; color: white; text-decoration: none;">
								Call Now: (+44) 7539 248 324 <i class="ph-bold ph-phone"></i>
							</a>
						</div>
					</div>
				</div>
			</section>

			<!-- Specialized Paediatric Solutions: Elite Dashboard Redesign -->
			<section style="padding: 180px 0; background: #0f172a; color: white; position: relative; overflow: hidden;">
				<!-- Dynamic clinical glow -->
				<div style="position: absolute; top: -10%; left: -10%; width: 800px; height: 800px; background: radial-gradient(circle, rgba(59, 130, 246, 0.08) 0%, transparent 70%); border-radius: 50%;"></div>
				
				<div class="container" style="position: relative; z-index: 2;">
					<div style="text-align: center; margin-bottom: 100px;">
						<div class="badge" style="background: rgba(255,255,255,0.1); color: white; border-color: rgba(255,255,255,0.2);">Comprehensive Care</div>
						<h2 class="section-title" style="color: white; font-size: 4.8rem; letter-spacing: -0.04em;">Specialized Paediatric <br><span class="text-gradient">Clinical Solutions</span></h2>
						<p style="font-family: 'Inter'; font-size: 1.4rem; color: #94a3b8; max-width: 800px; margin: 0 auto;">
							Expert clinical care beyond wax removal, delivering hospital-grade ENT excellence directly to your home.
						</p>
					</div>

					<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 60px;">
						<!-- Solution 01: Ear Infection -->
						<div class="solution-panel" style="position: relative; height: 700px; border-radius: 60px; overflow: hidden; box-shadow: 0 40px 100px rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.05); transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);" onmouseover="this.style.transform='translateY(-20px)';" onmouseout="this.style.transform='translateY(0)';">
							<img src="<?php echo esc_url( $settings['service_infection_image']['url'] ); ?>" alt="Paediatric Ear Infection" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7;">
							
							<!-- Glass Overlay -->
							<div style="position: absolute; bottom: 40px; left: 40px; right: 40px; background: rgba(15, 23, 42, 0.8); backdrop-filter: blur(20px); padding: 50px; border-radius: 45px; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
								<div style="width: 50px; height: 50px; background: #3b82f6; color: white; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; margin-bottom: 25px;">
									<i class="ph-fill ph-first-aid"></i>
								</div>
								<h3 style="font-family: 'Outfit'; font-size: 2.2rem; color: white; margin-bottom: 15px; line-height: 1.1;">Ear Infection <br><span class="text-gradient">Clinical Care</span></h3>
								<p style="color: #94a3b8; line-height: 1.8; font-size: 1.1rem; margin-bottom: 30px;">
									Expert assessment for acute pain, discharge, or swimmer's ear, with immediate clinical guidance and home-visit management.
								</p>
								<a href="#" style="font-family: 'Outfit'; font-weight: 800; color: #3b82f6; text-decoration: none; display: flex; align-items: center; gap: 10px; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 1px;">
									Learn More <i class="ph-bold ph-arrow-right"></i>
								</a>
							</div>
						</div>

						<!-- Solution 02: Foreign Body -->
						<div class="solution-panel" style="position: relative; height: 700px; border-radius: 60px; overflow: hidden; box-shadow: 0 40px 100px rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.05); transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);" onmouseover="this.style.transform='translateY(-20px)';" onmouseout="this.style.transform='translateY(0)';">
							<img src="<?php echo esc_url( $settings['service_foreign_image']['url'] ); ?>" alt="Paediatric Foreign Body" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7;">
							
							<!-- Glass Overlay -->
							<div style="position: absolute; bottom: 40px; left: 40px; right: 40px; background: rgba(15, 23, 42, 0.8); backdrop-filter: blur(20px); padding: 50px; border-radius: 45px; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
								<div style="width: 50px; height: 50px; background: #60a5fa; color: white; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; margin-bottom: 25px;">
									<i class="ph-fill ph-magnifying-glass"></i>
								</div>
								<h3 style="font-family: 'Outfit'; font-size: 2.2rem; color: white; margin-bottom: 15px; line-height: 1.1;">Foreign Body <br><span class="text-gradient">Expert Removal</span></h3>
								<p style="color: #94a3b8; line-height: 1.8; font-size: 1.1rem; margin-bottom: 30px;">
									Safe extraction of beads, food, or toys using precise clinical tools in a calm, child-friendly environment at your home.
								</p>
								<a href="#" style="font-family: 'Outfit'; font-weight: 800; color: #60a5fa; text-decoration: none; display: flex; align-items: center; gap: 10px; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 1px;">
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
