<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Ear_Infection_Page_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_ear_infection_page';
	}

	public function get_title() {
		return esc_html__( 'Otic Ear Infection Page', 'otic-eye-care' );
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

		$this->add_control( 'video_url', [ 'label' => 'YouTube Video ID', 'type' => Controls_Manager::TEXT, 'default' => '01iI_AIdEPA' ] );
		$this->add_control( 'hero_badge', [ 'label' => 'Badge Text', 'type' => Controls_Manager::TEXT, 'default' => 'Ear Infection Specialist' ] );
		$this->add_control( 'hero_title', [ 'label' => 'Title', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Ear infection treatment <br>[london]' ] );
		$this->add_control( 'hero_desc', [ 'label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => 'We offer private mobile ear infection treatment in London for both adults and children. Swimmers Ear or Otitis Externa causes pain, discharge and reduced hearing.' ] );
		$this->add_control( 'hero_form_title', [ 'label' => 'Form Title', 'type' => Controls_Manager::TEXT, 'default' => 'Request Callback' ] );

		$this->end_controls_section();

		// --- Process Steps ---
		$this->start_controls_section(
			'section_steps',
			[
				'label' => esc_html__( 'Appointment Process', 'otic-eye-care' ),
			]
		);

		$repeater_steps = new Repeater();
		$repeater_steps->add_control( 'step_icon', [ 'label' => 'Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-duotone ph-check-circle' ] ] );
		$repeater_steps->add_control( 'step_title', [ 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Step Title' ] );
		$repeater_steps->add_control( 'step_desc', [ 'label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Step Description' ] );

		$this->add_control(
			'steps',
			[
				'label' => 'Steps',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater_steps->get_controls(),
				'default' => [
					[ 'step_title' => 'History', 'step_desc' => 'Consultation to explore your ear symptoms', 'step_icon' => [ 'value' => 'ph-duotone ph-clipboard-text' ] ],
					[ 'step_title' => 'Consent', 'step_desc' => 'Explanation of procedure prior to examination', 'step_icon' => [ 'value' => 'ph-duotone ph-file-text' ] ],
					[ 'step_title' => 'Examination', 'step_desc' => 'Both ears will be examined using a microscope', 'step_icon' => [ 'value' => 'ph-duotone ph-microscope' ] ],
					[ 'step_title' => 'Procedure', 'step_desc' => 'If required, microsuction will be performed', 'step_icon' => [ 'value' => 'ph-duotone ph-needle' ] ],
					[ 'step_title' => 'Prescription', 'step_desc' => 'Medicine will be prescribed to treat your ear', 'step_icon' => [ 'value' => 'ph-duotone ph-pill' ] ],
					[ 'step_title' => 'Aftercare', 'step_desc' => 'Full guidance on post-treatment care', 'step_icon' => [ 'value' => 'ph-duotone ph-shield-check' ] ],
				],
				'title_field' => '{{{ step_title }}}',
			]
		);

		$this->end_controls_section();

		// --- Infection Types ---
		$this->start_controls_section(
			'section_types',
			[
				'label' => esc_html__( 'Infection Types', 'otic-eye-care' ),
			]
		);

		$this->add_control( 'type_outer_icon', [ 'label' => 'Outer Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-duotone ph-ear' ] ] );
		$this->add_control( 'type_outer_desc', [ 'label' => 'Outer Ear Desc', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Inflammation of the ear canal skin, typically caused by bacteria and fungus.' ] );
		
		$this->add_control( 'type_middle_icon', [ 'label' => 'Middle Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-duotone ph-waveform' ] ] );
		$this->add_control( 'type_middle_desc', [ 'label' => 'Middle Ear Desc', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Infection located behind the ear drum, which is more common in children.' ] );
		
		$this->add_control( 'type_inner_icon', [ 'label' => 'Inner Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-fill ph-target' ] ] );
		$this->add_control( 'type_inner_desc', [ 'label' => 'Inner Ear Desc', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Located in the deepest part of the ear and is commonly caused by viruses.' ] );

		$this->end_controls_section();

		// --- Symptoms & Risks ---
		$this->start_controls_section(
			'section_symptoms',
			[
				'label' => esc_html__( 'Symptoms & Risks', 'otic-eye-care' ),
			]
		);

		$repeater_list = new Repeater();
		$repeater_list->add_control( 'item_text', [ 'label' => 'Item Text', 'type' => Controls_Manager::TEXT ] );

		$this->add_control( 'symptoms_list', [
			'label' => 'Symptoms',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater_list->get_controls(),
			'default' => [
				[ 'item_text' => 'Earache or ear pain' ],
				[ 'item_text' => 'Fever (often the only symptom)' ],
				[ 'item_text' => 'Itchy ears' ],
				[ 'item_text' => 'Smelly discharge' ],
				[ 'item_text' => 'Deafness or blocked ears' ],
			],
			'title_field' => '{{{ item_text }}}',
		]);

		$this->add_control( 'risks_list', [
			'label' => 'Risk Factors',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater_list->get_controls(),
			'default' => [
				[ 'item_text' => 'Trauma to ear canal' ],
				[ 'item_text' => 'Excessive ear wax' ],
				[ 'item_text' => 'Skin conditions' ],
				[ 'item_text' => 'Swimming' ],
				[ 'item_text' => 'Diabetes or weakened immune system' ],
			],
			'title_field' => '{{{ item_text }}}',
		]);

		$this->end_controls_section();

		// --- Benefits ---
		$this->start_controls_section(
			'section_benefits',
			[
				'label' => esc_html__( 'Home Visit Benefits', 'otic-eye-care' ),
			]
		);

		$repeater_benefits = new Repeater();
		$repeater_benefits->add_control( 'benefit_icon', [ 'label' => 'Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-duotone ph-check-circle' ] ] );
		$repeater_benefits->add_control( 'benefit_text', [ 'label' => 'Benefit Text', 'type' => Controls_Manager::TEXT ] );

		$this->add_control( 'benefits', [
			'label' => 'Benefits',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater_benefits->get_controls(),
			'default' => [
				[ 'benefit_text' => 'Accessible to patients with limited mobility.', 'benefit_icon' => [ 'value' => 'ph-duotone ph-wheelchair' ] ],
				[ 'benefit_text' => 'Convenience. We travel so you don’t have to.', 'benefit_icon' => [ 'value' => 'ph-duotone ph-house' ] ],
				[ 'benefit_text' => 'Available out of hours.', 'benefit_icon' => [ 'value' => 'ph-duotone ph-clock' ] ],
				[ 'benefit_text' => 'No need to organise childcare.', 'benefit_icon' => [ 'value' => 'ph-duotone ph-baby' ] ],
				[ 'benefit_text' => 'Alleviate stress for nervous patients.', 'benefit_icon' => [ 'value' => 'ph-duotone ph-heart-beat' ] ],
				[ 'benefit_text' => 'Privacy and discretion.', 'benefit_icon' => [ 'value' => 'ph-duotone ph-shield-check' ] ],
				[ 'benefit_text' => 'Reduced infection risk.', 'benefit_icon' => [ 'value' => 'ph-duotone ph-virus' ] ],
				[ 'benefit_text' => 'Family can be present.', 'benefit_icon' => [ 'value' => 'ph-duotone ph-users' ] ],
			],
			'title_field' => '{{{ benefit_text }}}',
		]);

		$this->end_controls_section();

		// --- Pricing ---
		$this->start_controls_section(
			'section_pricing',
			[
				'label' => esc_html__( 'Pricing Table', 'otic-eye-care' ),
			]
		);

		$repeater_price = new Repeater();
		$repeater_price->add_control( 'service_name', [ 'label' => 'Service', 'type' => Controls_Manager::TEXT ] );
		$repeater_price->add_control( 'service_fee', [ 'label' => 'Fee', 'type' => Controls_Manager::TEXT ] );

		$this->add_control( 'pricing_rows', [
			'label' => 'Pricing Rows',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater_price->get_controls(),
			'default' => [
				[ 'service_name' => 'Ear infection treatment (incl private prescription)', 'service_fee' => '£250' ],
				[ 'service_name' => 'Ear infection follow-up', 'service_fee' => '£150' ],
				[ 'service_name' => 'Children (2-12 years)', 'service_fee' => '+£75' ],
				[ 'service_name' => 'Emergency appointment (7.00pm – 7.00am)', 'service_fee' => '+£175' ],
			],
			'title_field' => '{{{ service_name }}}',
		]);

		$this->add_control(
			'pricing_footer',
			[
				'label' => esc_html__( 'Footer Note', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Fees are inclusive for one or both ears. Clinical consultation fee of £100 applies if no microsuction treatment is indicated.', 'otic-eye-care' ),
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$hero_title = str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['hero_title'] );
		?>

		<!-- Standardized Hero Section -->
		<section class="hero" id="treatment-hero">
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
					<h1><?php echo wp_kses_post( $hero_title ); ?></h1>
					<p><?php echo esc_html( $settings['hero_desc'] ); ?></p>
					<div class="hero-actions">
						<a href="#" class="btn btn-primary btn-lg">Book Now <i class="ph-bold ph-arrow-right"></i></a>
						<a href="#" class="btn btn-outline btn-lg">Learn More</a>
					</div>
				</div>

				<div class="hero-form-card">
					<h3><?php echo esc_html( $settings['hero_form_title'] ); ?></h3>
					<form class="appointment-form">
						<div class="form-group"><input type="text" placeholder="Full Name" required></div>
						<div class="form-group"><input type="tel" placeholder="Phone Number" required></div>
						<div class="form-group"><input type="text" placeholder="London Postcode" required></div>
						<div class="form-group">
							<select required>
								<option value="" disabled selected>Select Treatment</option>
								<option value="wax">Ear Wax Removal</option>
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

		<!-- Process Steps Redesign: Animated Vertical Timeline -->
		<section class="appointment-process" style="padding: 140px 0; background: #fcfdfe; position: relative; overflow: hidden;">
			<!-- Animated background shapes -->
			<div style="position: absolute; top: 10%; right: -5%; width: 400px; height: 400px; background: rgba(59, 130, 246, 0.03); border-radius: 50%; filter: blur(60px); animation: drift 20s infinite linear;"></div>
			<div style="position: absolute; bottom: 5%; left: -5%; width: 300px; height: 300px; background: rgba(96, 165, 250, 0.04); border-radius: 50%; filter: blur(50px); animation: drift 25s infinite linear reverse;"></div>

			<style>
				@keyframes drift {
					0% { transform: translate(0, 0) rotate(0deg); }
					50% { transform: translate(50px, 30px) rotate(180deg); }
					100% { transform: translate(0, 0) rotate(360deg); }
				}
				@keyframes slideInRight {
					from { opacity: 0; transform: translateX(50px); }
					to { opacity: 1; transform: translateX(0); }
				}
				@keyframes slideInLeft {
					from { opacity: 0; transform: translateX(-50px); }
					to { opacity: 1; transform: translateX(0); }
				}
				@keyframes flowLine {
					0% { top: 0; opacity: 0; }
					5% { opacity: 1; }
					95% { opacity: 1; }
					100% { top: 100%; opacity: 0; }
				}
				.process-item:hover .process-icon-wrap {
					transform: scale(1.1) rotate(5deg);
					background: var(--primary) !important;
					color: white !important;
				}
				.process-item:hover .process-card {
					box-shadow: 0 40px 80px rgba(0,0,0,0.06) !important;
					border-color: rgba(59, 130, 246, 0.2) !important;
				}
			</style>

			<div class="container" style="position: relative; z-index: 2;">
				<div style="text-align: center; margin-bottom: 100px;">
					<div class="badge" style="margin-bottom: 25px; background: white;">Our Methodology</div>
					<h2 class="section-title" style="font-size: 3.5rem;">Your Private <span class="text-gradient">Appointment</span></h2>
					<p style="font-family: 'Inter'; font-size: 1.25rem; color: #64748b; max-width: 700px; margin: 0 auto;">A structured, high-fidelity clinical process delivered at your convenience.</p>
				</div>
				
				<div style="max-width: 900px; margin: 0 auto; position: relative;">
					<!-- Vertical Center Line -->
					<div style="position: absolute; top: 0; bottom: 0; left: 50%; width: 2px; background: linear-gradient(to bottom, transparent, #e2e8f0 15%, #e2e8f0 85%, transparent); transform: translateX(-50%);">
						<!-- Traveling Light Effect -->
						<div style="position: absolute; width: 10px; height: 10px; background: var(--primary); border-radius: 50%; left: 50%; transform: translateX(-50%); box-shadow: 0 0 15px var(--primary); animation: flowLine 4s infinite linear;"></div>
					</div>

					<?php foreach ( $settings['steps'] as $index => $step ) : 
						$is_even = ($index % 2 === 0);
						$anim_name = $is_even ? 'slideInLeft' : 'slideInRight';
					?>
						<div class="process-item" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 80px; position: relative; animation: <?php echo $anim_name; ?> 0.8s ease forwards; animation-delay: <?php echo $index * 0.2; ?>s; opacity: 0;">
							
							<!-- Content Side -->
							<div style="width: 42%; <?php echo $is_even ? 'text-align: right;' : 'order: 2; text-align: left;'; ?>">
								<div class="process-card" style="background: white; padding: 45px; border-radius: 40px; border-left: 6px solid var(--primary); box-shadow: 0 15px 50px rgba(0,0,0,0.03); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); position: relative; <?php echo $is_even ? 'border-left: 0; border-right: 6px solid var(--primary);' : ''; ?>">
									<h3 style="font-family: 'Outfit'; font-size: 1.8rem; color: #1e293b; margin-bottom: 12px; letter-spacing: -0.01em;"><?php echo esc_html( $step['step_title'] ); ?></h3>
									<p style="font-family: 'Inter'; font-size: 1.1rem; color: #64748b; line-height: 1.65; margin: 0;"><?php echo esc_html( $step['step_desc'] ); ?></p>
								</div>
							</div>

							<!-- Center Icon -->
							<div class="process-icon-wrap" style="width: 80px; height: 80px; background: white; border: 2px solid #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: absolute; left: 50%; transform: translateX(-50%); z-index: 5; color: var(--primary); font-size: 2.2rem; box-shadow: 0 10px 25px rgba(0,0,0,0.05); transition: all 0.3s ease;">
								<i class="<?php echo esc_attr( $step['step_icon']['value'] ); ?>"></i>
							</div>

							<!-- Spacer Side -->
							<div style="width: 42%; <?php echo $is_even ? 'order: 2;' : ''; ?>"></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<!-- Infection Types Deep Dive -->
		<section class="clinical-details" style="padding: 120px 0; background: #0f172a; color: white; position: relative; overflow: hidden;">
			<!-- Animated Background Elements -->
			<div style="position: absolute; inset: 0; pointer-events: none; z-index: 0;">
				<div style="position: absolute; top: -10%; right: -5%; width: 600px; height: 600px; background: radial-gradient(circle, rgba(59, 130, 246, 0.08) 0%, transparent 70%); border-radius: 50%; animation: pulse-blob 8s infinite alternate;"></div>
				<div style="position: absolute; bottom: -20%; left: -10%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(96, 165, 250, 0.05) 0%, transparent 70%); border-radius: 50%; animation: pulse-blob 12s infinite alternate-reverse;"></div>
				<div style="position: absolute; top: 40%; left: 30%; width: 300px; height: 300px; background: radial-gradient(circle, rgba(59, 130, 246, 0.03) 0%, transparent 70%); border-radius: 50%; animation: pulse-blob 10s infinite alternate;"></div>
			</div>

			<style>
				@keyframes pulse-blob {
					0% { transform: translate(0, 0) scale(1); opacity: 0.5; }
					50% { transform: translate(30px, -20px) scale(1.1); opacity: 0.8; }
					100% { transform: translate(-20px, 30px) scale(0.9); opacity: 0.5; }
				}
			</style>

			<div class="container" style="position: relative; z-index: 2;">
				<div style="text-align: center; margin-bottom: 70px;">
					<div class="badge" style="margin-bottom: 20px; border-color: rgba(255,255,255,0.1); color: #60a5fa;">Clinical Intelligence</div>
					<h2 class="section-title" style="color: white; font-size: 3.5rem;">Advanced Clinical <span class="text-gradient">Insights</span></h2>
					<p style="font-family: 'Inter'; font-size: 1.25rem; color: rgba(255,255,255,0.5); max-width: 700px; margin: 0 auto;">Deep medical analysis of ear infection types and pathophysiology.</p>
				</div>
				<div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 40px;">
					<div class="clinical-intelligence-card" style="padding: 50px; border-radius: 40px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06); transition: all 0.4s; position: relative; overflow: hidden; backdrop-filter: blur(10px);">
						<div style="width: 70px; height: 70px; background: rgba(96, 165, 250, 0.1); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: #60a5fa; font-size: 2.5rem; margin-bottom: 30px;">
							<i class="<?php echo esc_attr( $settings['type_outer_icon']['value'] ); ?>"></i>
						</div>
						<h3 style="font-family: 'Outfit'; color: #60a5fa; margin-bottom: 25px; font-size: 2rem;">Outer Ear</h3>
						<p style="font-family: 'Inter'; color: rgba(255,255,255,0.65); line-height: 1.8; font-size: 1.1rem;"><?php echo esc_html( $settings['type_outer_desc'] ); ?></p>
					</div>
					<div class="clinical-intelligence-card" style="padding: 50px; border-radius: 40px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06); transition: all 0.4s; position: relative; overflow: hidden; backdrop-filter: blur(10px);">
						<div style="width: 70px; height: 70px; background: rgba(96, 165, 250, 0.1); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: #60a5fa; font-size: 2.5rem; margin-bottom: 30px;">
							<i class="<?php echo esc_attr( $settings['type_middle_icon']['value'] ); ?>"></i>
						</div>
						<h3 style="font-family: 'Outfit'; color: #60a5fa; margin-bottom: 25px; font-size: 2rem;">Middle Ear</h3>
						<p style="font-family: 'Inter'; color: rgba(255,255,255,0.65); line-height: 1.8; font-size: 1.1rem;"><?php echo esc_html( $settings['type_middle_desc'] ); ?></p>
					</div>
					<div class="clinical-intelligence-card" style="padding: 50px; border-radius: 40px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06); transition: all 0.4s; position: relative; overflow: hidden; backdrop-filter: blur(10px);">
						<div style="width: 70px; height: 70px; background: rgba(96, 165, 250, 0.1); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: #60a5fa; font-size: 2.5rem; margin-bottom: 30px;">
							<i class="<?php echo esc_attr( $settings['type_inner_icon']['value'] ?: 'ph-fill ph-target' ); ?>"></i>
						</div>
						<h3 style="font-family: 'Outfit'; color: #60a5fa; margin-bottom: 25px; font-size: 2rem;">Inner Ear</h3>
						<p style="font-family: 'Inter'; color: rgba(255,255,255,0.65); line-height: 1.8; font-size: 1.1rem;"><?php echo esc_html( $settings['type_inner_desc'] ); ?></p>
					</div>
				</div>
			</div>
		</section>

		<!-- Symptoms & Risks Modern Grid Redesign -->
		<section style="padding: 120px 0; background: #f8fafc;">
			<div class="container">
				<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px;">
					
					<!-- Key Symptoms Column -->
					<div>
						<div style="margin-bottom: 40px;">
							<div class="badge" style="margin-bottom: 20px;">Diagnosis</div>
							<h3 class="section-title" style="font-size: 2.8rem; margin-bottom: 10px;">Key <span class="text-gradient">Symptoms</span></h3>
							<p style="color: #64748b; font-family: 'Inter';">Clinical indicators of an active ear infection.</p>
						</div>
						
						<div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
							<?php foreach ( $settings['symptoms_list'] as $item ) : ?>
								<div class="clinical-feature-card" style="background: white; padding: 25px; border-radius: 25px; display: flex; align-items: center; gap: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.02); border: 1px solid #f1f5f9; transition: all 0.3s ease;">
									<div style="width: 50px; height: 50px; background: #eff6ff; color: #3b82f6; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0;">
										<i class="ph-bold ph-activity"></i>
									</div>
									<span style="font-family: 'Outfit'; font-weight: 600; font-size: 1.15rem; color: #1e293b;"><?php echo esc_html( $item['item_text'] ); ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<!-- Risk Factors Column -->
					<div>
						<div style="margin-bottom: 40px;">
							<div class="badge" style="margin-bottom: 20px; color: #ef4444; border-color: rgba(239, 68, 68, 0.1); background: rgba(239, 68, 68, 0.05);">Risk Assessment</div>
							<h3 class="section-title" style="font-size: 2.8rem; margin-bottom: 10px;"><span class="text-gradient">Risk</span> Factors</h3>
							<p style="color: #64748b; font-family: 'Inter';">Common causes and environmental contributors.</p>
						</div>
						
						<div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
							<?php foreach ( $settings['risks_list'] as $item ) : ?>
								<div class="clinical-feature-card" style="background: #fef2f2; padding: 25px; border-radius: 25px; display: flex; align-items: center; gap: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.02); border: 1px solid rgba(239, 68, 68, 0.05); transition: all 0.3s ease;">
									<div style="width: 50px; height: 50px; background: white; color: #ef4444; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0; box-shadow: 0 5px 15px rgba(239, 68, 68, 0.1);">
										<i class="ph-bold ph-shield-warning"></i>
									</div>
									<span style="font-family: 'Outfit'; font-weight: 600; font-size: 1.15rem; color: #991b1b;"><?php echo esc_html( $item['item_text'] ); ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

				</div>
			</div>
		</section>

		<!-- Clinic Benefits Redesign -->
		<section style="padding: 120px 0; background: #f8fafc; position: relative; overflow: hidden;">
			<!-- Subtle background pattern -->
			<div style="position: absolute; inset: 0; opacity: 0.03; background-image: radial-gradient(#3b82f6 1px, transparent 1px); background-size: 30px 30px;"></div>
			
			<div class="container" style="position: relative; z-index: 2;">
				<div style="text-align: center; margin-bottom: 70px;">
					<div class="badge" style="margin-bottom: 25px;">Mobile Clinic</div>
					<h2 class="section-title">Our Mobile Clinic <span class="text-gradient">Advantage</span></h2>
					<p style="font-family: 'Inter'; font-size: 1.25rem; color: var(--text-muted); max-width: 800px; margin: 0 auto;">Premium on-site ear care that prioritizes your comfort and clinical safety.</p>
				</div>
				<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 30px;">
					<?php foreach ( $settings['benefits'] as $index => $benefit ) : ?>
						<div class="service-feature-card card-blue" style="text-align: left;">
							<div class="card-image-section" style="height: 140px; background: #f8fbff; display: flex; align-items: center; justify-content: center; position: relative;">
								<div style="font-size: 3.5rem; color: var(--primary); opacity: 0.8;">
									<i class="<?php echo esc_attr( $benefit['benefit_icon']['value'] ); ?>"></i>
								</div>
								<div class="service-tag" style="top: 1rem; right: 1rem; font-size: 0.65rem;">Benefit 0<?php echo $index + 1; ?></div>
								<div class="gloss-overlay"></div>
							</div>
							<div class="card-body" style="padding: 2rem 1.5rem;">
								<h3 style="font-family: 'Outfit'; font-size: 1.15rem; margin-bottom: 0; line-height: 1.4; color: #1e293b;"><?php echo esc_html( $benefit['benefit_text'] ); ?></h3>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<!-- Fees Section Redesign -->
		<section style="padding: 140px 0; background: #fcfdfe; position: relative; overflow: hidden;">
			<!-- Background accent -->
			<div style="position: absolute; top: -10%; left: -5%; width: 600px; height: 600px; background: radial-gradient(circle, rgba(59, 130, 246, 0.04) 0%, transparent 70%); border-radius: 50%;"></div>
			
			<div class="container" style="position: relative; z-index: 2;">
				<div style="max-width: 900px; margin: 0 auto;">
					<div style="text-align: center; margin-bottom: 70px;">
						<div class="badge" style="margin-bottom: 25px; background: white;">Transparent Pricing</div>
						<h2 class="section-title" style="font-size: 3.5rem;">Professional <span class="text-gradient">Fees</span></h2>
						<p style="font-family: 'Inter'; font-size: 1.25rem; color: #64748b; max-width: 600px; margin: 0 auto;">Clear, upfront pricing for expert clinical ear care at your doorstep.</p>
					</div>

					<div style="display: flex; flex-direction: column; gap: 20px;">
						<?php foreach ( $settings['pricing_rows'] as $row ) : ?>
							<div class="pricing-card-item" style="background: white; padding: 35px 45px; border-radius: 40px; display: flex; justify-content: space-between; align-items: center; border: 1px solid #f1f5f9; box-shadow: 0 10px 30px rgba(0,0,0,0.02); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);" onmouseover="this.style.transform='translateX(10px)'; this.style.borderColor='rgba(59, 130, 246, 0.2)'; this.style.boxShadow='0 25px 60px rgba(0,0,0,0.05)';" onmouseout="this.style.transform='translateX(0)'; this.style.borderColor='#f1f5f9'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.02)';">
								<div style="display: flex; align-items: center; gap: 30px;">
									<div style="width: 56px; height: 56px; background: #eff6ff; color: var(--primary); border-radius: 18px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; flex-shrink: 0;">
										<i class="ph-bold ph-receipt"></i>
									</div>
									<h4 style="font-family: 'Outfit'; font-weight: 700; font-size: 1.4rem; color: #1e293b; margin: 0; letter-spacing: -0.01em;"><?php echo esc_html( $row['service_name'] ); ?></h4>
								</div>
								<div style="font-family: 'Outfit'; font-weight: 800; font-size: 1.75rem; color: var(--primary); background: #f0f9ff; padding: 12px 30px; border-radius: 20px; border: 1px solid rgba(59, 130, 246, 0.1);">
									<?php echo esc_html( $row['service_fee'] ); ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

					<!-- Pricing Footer -->
					<div style="margin-top: 50px; padding: 40px; background: #f8fafc; border-radius: 40px; border: 1px solid #f1f5f9; text-align: center; position: relative; overflow: hidden;">
						<div style="position: absolute; top: 0; right: 0; width: 150px; height: 150px; background: rgba(59, 130, 246, 0.03); border-radius: 50%; filter: blur(30px);"></div>
						<p style="font-family: 'Inter'; color: #64748b; margin: 0; font-size: 1.15rem; font-weight: 500; position: relative; z-index: 2; line-height: 1.6;">
							<i class="ph-fill ph-info" style="color: var(--primary); margin-right: 12px; font-size: 1.3rem; vertical-align: middle;"></i> 
							<?php echo esc_html( $settings['pricing_footer'] ); ?>
						</p>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
}
