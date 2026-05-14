<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Foreign_Body_Removal_Page_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_foreign_body_removal_page';
	}

	public function get_title() {
		return esc_html__( 'Otic Foreign Body Removal Page', 'otic-eye-care' );
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
				'default' => 'Emergency Removal',
			]
		);

		$this->add_control(
			'hero_title',
			[
				'label' => 'Title',
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Ear Foreign [Body Removal] London',
			]
		);

		$this->add_control(
			'hero_description',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'We provide mobile ear clinic for foreign body and object removal from you ears in London, for both adults and children.',
			]
		);

		$this->add_control(
			'video_url',
			[
				'label' => esc_html__( 'YouTube Video ID', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXT,
				'default' => '01iI_AIdEPA',
				'description' => esc_html__( 'Enter the YouTube Video ID (e.g., 01iI_AIdEPA)', 'otic-eye-care' ),
			]
		);

		$this->end_controls_section();

		// --- Appointment Process ---
		$this->start_controls_section(
			'section_process',
			[
				'label' => esc_html__( 'Appointment Process', 'otic-eye-care' ),
			]
		);

		$repeater_steps = new Repeater();
		$repeater_steps->add_control( 'step_icon', [ 'label' => 'Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-duotone ph-check-circle' ] ] );
		$repeater_steps->add_control( 'step_title', [ 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Step Title' ] );
		$repeater_steps->add_control( 'step_desc', [ 'label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Step Description' ] );

		$this->add_control( 'steps', [
			'label' => 'Steps',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater_steps->get_controls(),
			'default' => [
				[ 'step_title' => 'History', 'step_desc' => 'Consultation to explore your ear symptoms', 'step_icon' => [ 'value' => 'ph-duotone ph-clipboard-text' ] ],
				[ 'step_title' => 'Consent', 'step_desc' => 'Explanation of procedure prior to examination', 'step_icon' => [ 'value' => 'ph-duotone ph-file-text' ] ],
				[ 'step_title' => 'Examination', 'step_desc' => 'Both ears will be examined using a microscope', 'step_icon' => [ 'value' => 'ph-duotone ph-microscope' ] ],
				[ 'step_title' => 'Procedure', 'step_desc' => 'Safe removal of the foreign body in your ear', 'step_icon' => [ 'value' => 'ph-duotone ph-needle' ] ],
				[ 'step_title' => 'Prescription', 'step_desc' => 'If required, medicine will be prescribed to treat your ear', 'step_icon' => [ 'value' => 'ph-duotone ph-pill' ] ],
				[ 'step_title' => 'Aftercare', 'step_desc' => 'Full guidance on post-treatment care', 'step_icon' => [ 'value' => 'ph-duotone ph-shield-check' ] ],
			],
			'title_field' => '{{{ step_title }}}',
		]);

		$this->end_controls_section();

		// --- Expert Insights Section ---
		$this->start_controls_section(
			'section_expert_insights',
			[
				'label' => esc_html__( 'Expert Insights', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'insights_badge',
			[
				'label' => 'Badge',
				'type' => Controls_Manager::TEXT,
				'default' => 'Clinical Intelligence',
			]
		);

		$this->add_control(
			'insights_title',
			[
				'label' => 'Title',
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Expert Insights into [Foreign Bodies]',
			]
		);

		$this->add_control(
			'insights_desc',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'A foreign body in the ear canal is a common clinical presentation, particularly in children. Safe removal requires specialized ENT instrumentation and microscopic visualization.',
			]
		);

		$this->add_control(
			'insights_image',
			[
				'label' => 'Insights Image',
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&q=80&w=1000',
				],
			]
		);

		$this->add_control(
			'insights_quote',
			[
				'label' => 'Quote/Diagnosis Text',
				'type' => Controls_Manager::TEXTAREA,
				'default' => '"It is usually straightforward to diagnose a foreign body. Our ENT doctor will examine your ear with a bright light to identify the object and work out the best way to safely remove it."',
			]
		);

		$this->end_controls_section();

		// --- Common Objects ---
		$this->start_controls_section(
			'section_objects',
			[
				'label' => esc_html__( 'Common Objects', 'otic-eye-care' ),
			]
		);

		$repeater_objects = new Repeater();
		$repeater_objects->add_control( 'object_name', [ 'label' => 'Object Name', 'type' => Controls_Manager::TEXT ] );
		$repeater_objects->add_control( 'object_icon', [ 'label' => 'Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-duotone ph-dot' ] ] );

		$this->add_control( 'common_objects', [
			'label' => 'Objects',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater_objects->get_controls(),
			'default' => [
				[ 'object_name' => 'Sweetcorn', 'object_icon' => [ 'value' => 'ph-duotone ph-apple-logo' ] ],
				[ 'object_name' => 'Peas', 'object_icon' => [ 'value' => 'ph-duotone ph-dots-three-circle' ] ],
				[ 'object_name' => 'Popcorn', 'object_icon' => [ 'value' => 'ph-duotone ph-cookie' ] ],
				[ 'object_name' => 'Seed', 'object_icon' => [ 'value' => 'ph-duotone ph-plant' ] ],
				[ 'object_name' => 'Battery', 'object_icon' => [ 'value' => 'ph-duotone ph-battery-high' ] ],
				[ 'object_name' => 'Stone', 'object_icon' => [ 'value' => 'ph-duotone ph-mountains' ] ],
				[ 'object_name' => 'Paper', 'object_icon' => [ 'value' => 'ph-duotone ph-file' ] ],
				[ 'object_name' => 'Bead', 'object_icon' => [ 'value' => 'ph-duotone ph-circle' ] ],
				[ 'object_name' => 'Moth', 'object_icon' => [ 'value' => 'ph-duotone ph-bug' ] ],
				[ 'object_name' => 'Cotton bud', 'object_icon' => [ 'value' => 'ph-duotone ph-swatches' ] ],
				[ 'object_name' => 'Spider', 'object_icon' => [ 'value' => 'ph-duotone ph-bug-beetle' ] ],
				[ 'object_name' => 'Earplug', 'object_icon' => [ 'value' => 'ph-duotone ph-ear' ] ],
			],
			'title_field' => '{{{ object_name }}}',
		]);

		$this->end_controls_section();

		// --- Specialized Methods Section ---
		$this->start_controls_section(
			'section_specialized_methods',
			[
				'label' => esc_html__( 'Removal Methods & Grommets', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'methods_badge',
			[
				'label' => 'Badge',
				'type' => Controls_Manager::TEXT,
				'default' => 'Clinical Excellence',
			]
		);

		$this->add_control(
			'methods_title',
			[
				'label' => 'Title',
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Specialized [Removal] Methods',
			]
		);

		$this->add_control(
			'methods_desc',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Our ENT specialists are equipped with precision instruments to ensure the safe extraction of varied objects from the ear canal.',
			]
		);

		$this->add_control(
			'methods_image',
			[
				'label' => 'Methods Image',
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&q=80&w=1000',
				],
			]
		);

		$this->add_control(
			'grommet_title',
			[
				'label' => 'Grommet Title',
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'A Note on [Grommets]',
			]
		);

		$this->add_control(
			'grommet_desc',
			[
				'label' => 'Grommet Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Grommets are small plastic tubes surgically inserted into the eardrum. When they naturally push out, they can sometimes become a foreign body that needs professional removal. Our ENT specialists can identify and extract these safely during your consultation.',
			]
		);

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
				[ 'service_name' => 'Foreign body removal', 'service_fee' => '£225' ],
				[ 'service_name' => 'Children (2-12 years)', 'service_fee' => '+£75' ],
				[ 'service_name' => 'Travel outside London', 'service_fee' => 'from £50' ],
				[ 'service_name' => 'Private prescription', 'service_fee' => '+£50' ],
				[ 'service_name' => 'Emergency appointment (7.00pm – 7.00am)', 'service_fee' => '+£175' ],
			],
			'title_field' => '{{{ service_name }}}',
		]);

		$this->add_control(
			'pricing_footer',
			[
				'label' => esc_html__( 'Footer Note', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Fees are for one or both ears. If no treatment is required, a consultation fee of £100 will be charged.', 'otic-eye-care' ),
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
			
			@keyframes drift { 0% { transform: translate(0, 0) rotate(0deg); } 50% { transform: translate(50px, 30px) rotate(180deg); } 100% { transform: translate(0, 0) rotate(360deg); } }
			@keyframes slideInRight { from { opacity: 0; transform: translateX(50px); } to { opacity: 1; transform: translateX(0); } }
			@keyframes slideInLeft { from { opacity: 0; transform: translateX(-50px); } to { opacity: 1; transform: translateX(0); } }
			@keyframes flowLine { 0% { top: 0; opacity: 0; } 5% { opacity: 1; } 95% { opacity: 1; } 100% { top: 100%; opacity: 0; } }

			.object-card { background: white; padding: 25px; border-radius: 25px; border: 1px solid #f1f5f9; box-shadow: 0 10px 30px rgba(0,0,0,0.02); transition: all 0.3s ease; text-align: center; }
			.object-card:hover { transform: translateY(-10px); border-color: #3b82f6; box-shadow: 0 20px 40px rgba(59, 130, 246, 0.1); }

			/* Responsive Utilities */
			@media (max-width: 1024px) {
				.hero-content { grid-template-columns: 1fr !important; gap: 60px !important; }
				.hero-text { text-align: center; }
				.hero-actions { justify-content: center; }
				.expert-grid { grid-template-columns: 1fr !important; gap: 60px !important; }
				.common-objects-grid { grid-template-columns: repeat(3, 1fr) !important; }
				.methods-grid { grid-template-columns: 1fr !important; }
			}

			@media (max-width: 768px) {
				.section-title { font-size: 2.5rem !important; }
				.hero-title { font-size: 2.8rem !important; }
				.common-objects-grid { grid-template-columns: repeat(2, 1fr) !important; }
				
				.clinical-excellence-badge {
					background: #3b82f6 !important;
					color: white !important;
					box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3) !important;
					padding: 12px 30px !important;
					font-size: 0.9rem !important;
					border: none !important;
					margin-left: auto !important;
					margin-right: auto !important;
				}

				.expert-grid > div:first-child {
					text-align: center !important;
				}

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
			}

			@media (max-width: 480px) {
				.section-title { font-size: 2rem !important; }
				.hero-title { font-size: 2.2rem !important; }
				.hero-actions { flex-direction: column; width: 100%; gap: 10px !important; }
				.btn-lg { width: 100%; text-align: center; }
				.common-objects-grid { grid-template-columns: 1fr !important; }
				.pricing-card-item { flex-direction: column; gap: 20px; text-align: center; padding: 30px !important; }
				.pricing-card-item div { flex-direction: column; }
			}
		</style>

		<div class="otic-page-container">
			<!-- Standardized Hero Section -->
			<section class="hero" id="foreign-body-hero">
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
						<p style="font-size: 1.5rem; line-height: 1.6; opacity: 0.9; margin-bottom: 40px; font-family: 'Inter'; font-weight: 400;">
							<?php echo esc_html( $settings['hero_description'] ); ?>
						</p>
						<div class="hero-actions">
							<a href="#booking" class="btn btn-primary btn-lg">
								Book Now <i class="ph-bold ph-arrow-right"></i>
							</a>
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
									<option value="wax">Ear Wax Removal</option>
									<option value="infection">Ear Infection</option>
									<option value="foreign" selected>Foreign Body Removal</option>
								</select>
							</div>
							<button type="submit" class="btn btn-primary">Request Callback <i class="ph-bold ph-paper-plane-tilt"></i></button>
						</form>
						<p class="hero-secure-text"><i class="ph-fill ph-shield-check"></i> Secure & Confidential</p>
					</div>
				</div>
			</section>

			<!-- Emergency Alert -->
			<section style="background: #fef2f2; padding: 40px 0; border-bottom: 1px solid rgba(239, 68, 68, 0.1);">
				<div class="container" style="display: flex; align-items: center; justify-content: center; gap: 20px; color: #991b1b; font-weight: 700; text-align: center;">
					<i class="ph-fill ph-warning-octagon" style="font-size: 2.5rem; color: #ef4444;"></i>
					<p style="margin: 0; font-size: 1.2rem; font-family: 'Outfit';">
						If you or your child has a button battery or insect stuck in your ear, you must seek immediate medical attention.
					</p>
				</div>
			</section>

			<!-- Clinical Journey Redesign -->
			<section class="appointment-process" style="padding: 140px 0; background: #ffffff; position: relative; overflow: hidden;">
				<div class="container">
					<div style="text-align: center; margin-bottom: 100px;">
						<div class="badge">Clinical Methodology</div>
						<h2 class="section-title">Your Private <span class="text-gradient">Appointment</span></h2>
						<p style="font-family: 'Inter'; font-size: 1.25rem; color: #64748b; max-width: 700px; margin: 0 auto;">A structured, high-fidelity clinical process delivered at your home.</p>
					</div>
					
					<div style="max-width: 900px; margin: 0 auto; position: relative;">
						<!-- Vertical Center Line -->
						<div class="process-line" style="position: absolute; top: 0; bottom: 0; left: 50%; width: 2px; background: linear-gradient(to bottom, transparent, #e2e8f0 15%, #e2e8f0 85%, transparent); transform: translateX(-50%);">
							<div style="position: absolute; width: 10px; height: 10px; background: #3b82f6; border-radius: 50%; left: 50%; transform: translateX(-50%); box-shadow: 0 0 15px #3b82f6; animation: flowLine 4s infinite linear;"></div>
						</div>

						<?php foreach ( $settings['steps'] as $index => $step ) : 
							$is_even = ($index % 2 === 0);
							$anim_name = $is_even ? 'slideInLeft' : 'slideInRight';
						?>
							<div class="process-item" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 80px; position: relative; animation: <?php echo $anim_name; ?> 0.8s ease forwards; animation-delay: <?php echo $index * 0.2; ?>s;">
								
								<!-- Content Side -->
								<div class="process-card-wrapper" style="width: 42%; <?php echo $is_even ? 'text-align: right;' : 'order: 2; text-align: left;'; ?>">
									<div class="process-card" style="background: white; padding: 45px; border-radius: 40px; border-left: 6px solid #3b82f6; box-shadow: 0 15px 50px rgba(0,0,0,0.03); transition: all 0.4s ease; <?php echo $is_even ? 'border-left: 0; border-right: 6px solid #3b82f6;' : ''; ?>">
										<h3 style="font-family: 'Outfit'; font-size: 1.8rem; color: #1e293b; margin-bottom: 12px;"><?php echo esc_html( $step['step_title'] ); ?></h3>
										<p style="font-family: 'Inter'; font-size: 1.1rem; color: #64748b; line-height: 1.65; margin: 0;"><?php echo esc_html( $step['step_desc'] ); ?></p>
									</div>
								</div>

								<!-- Center Icon -->
								<div class="process-icon-wrapper" style="width: 80px; height: 80px; background: white; border: 2px solid #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: absolute; left: 50%; transform: translateX(-50%); z-index: 5; color: #3b82f6; font-size: 2.2rem; box-shadow: 0 10px 25px rgba(0,0,0,0.05); transition: all 0.3s ease;">
									<i class="<?php echo esc_attr( $step['step_icon']['value'] ); ?>"></i>
								</div>

								<!-- Spacer Side -->
								<div class="process-spacer" style="width: 42%; <?php echo $is_even ? 'order: 2;' : ''; ?>"></div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<!-- Insights Section Redesign: Clinical Intelligence -->
			<section style="padding: clamp(80px, 15vw, 140px) 0; background: #0f172a; color: white; position: relative; overflow: hidden;">
				<!-- Background Blobs -->
				<div style="position: absolute; top: -10%; right: -5%; width: 600px; height: 600px; background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%); border-radius: 50%; animation: drift 15s infinite alternate;"></div>
				<div style="position: absolute; bottom: -20%; left: -10%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(96, 165, 250, 0.08) 0%, transparent 70%); border-radius: 50%; animation: drift 20s infinite alternate-reverse;"></div>

				<div class="container" style="position: relative; z-index: 2;">
					<div class="expert-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: clamp(40px, 8vw, 100px); align-items: center;">
						<div>
							<div class="badge" style="background: rgba(255,255,255,0.1); color: white; border-color: rgba(255,255,255,0.2);"><?php echo esc_html( $settings['insights_badge'] ); ?></div>
							<h2 class="section-title" style="color: white; font-size: clamp(2.5rem, 5vw, 3.8rem);"><?php echo wp_kses_post( str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['insights_title'] ) ); ?></h2>
							<p style="font-size: clamp(1.1rem, 2vw, 1.3rem); line-height: 1.8; color: #94a3b8; margin-bottom: 40px; font-family: 'Inter';">
								<?php echo esc_html( $settings['insights_desc'] ); ?>
							</p>
							
							<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
								<div style="background: rgba(255,255,255,0.03); padding: 25px; border-radius: 25px; border: 1px solid rgba(255,255,255,0.06);">
									<div style="width: 40px; height: 40px; background: #3b82f6; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px; font-size: 1.2rem;">
										<i class="ph-bold ph-shield-check"></i>
									</div>
									<h4 style="font-family: 'Outfit'; color: white; margin-bottom: 8px; font-size: 1.1rem;">Safety Protocols</h4>
									<p style="margin: 0; color: #94a3b8; font-size: 0.85rem; line-height: 1.6;">Prompt removal is essential to prevent inflammation.</p>
								</div>
								<div style="background: rgba(255,255,255,0.03); padding: 25px; border-radius: 25px; border: 1px solid rgba(255,255,255,0.06);">
									<div style="width: 40px; height: 40px; background: #60a5fa; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px; font-size: 1.2rem;">
										<i class="ph-bold ph-baby"></i>
									</div>
									<h4 style="font-family: 'Outfit'; color: white; margin-bottom: 8px; font-size: 1.1rem;">Paediatric Care</h4>
									<p style="margin: 0; color: #94a3b8; font-size: 0.85rem; line-height: 1.6;">Gentle approach for stress-free procedures.</p>
								</div>
							</div>
						</div>
						
						<div style="position: relative;">
							<!-- Main Insight Image -->
							<div style="position: relative; border-radius: 40px; overflow: hidden; box-shadow: 0 40px 100px rgba(0,0,0,0.3); margin-bottom: 40px;">
								<img src="<?php echo esc_url( $settings['insights_image']['url'] ); ?>" alt="Clinical Insight" style="width: 100%; height: 400px; object-fit: cover;">
								<div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(15, 23, 42, 0.8) 0%, transparent 60%);"></div>
								
								<!-- Overlaid Quote -->
								<div style="position: absolute; bottom: 30px; left: 30px; right: 30px;">
									<div style="display: inline-flex; align-items: center; gap: 8px; background: #3b82f6; color: white; padding: 6px 15px; border-radius: 99px; font-family: 'Outfit'; font-weight: 800; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px;">
										<i class="ph-bold ph-stethoscope"></i> The Diagnosis
									</div>
									<p style="font-size: 1.2rem; line-height: 1.5; color: white; font-family: 'Outfit'; font-weight: 600; margin: 0;">
										<?php echo esc_html( $settings['insights_quote'] ); ?>
									</p>
								</div>
							</div>

							<!-- Floating Highlight Card -->
							<div style="position: absolute; bottom: -20px; right: -10px; width: 220px; z-index: 10;">
								<div style="background: #3b82f6; padding: 25px; border-radius: 30px; box-shadow: 0 30px 60px rgba(59, 130, 246, 0.4); border: 4px solid #0f172a;">
									<div style="width: 35px; height: 35px; background: rgba(255,255,255,0.15); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px; color: white; font-size: 1.2rem;">
										<i class="ph-bold ph-baby"></i>
									</div>
									<h5 style="font-family: 'Outfit'; color: white; margin: 0 0 5px; font-size: 1.1rem; font-weight: 800;">Kids Love Us!</h5>
									<p style="margin: 0; color: rgba(255,255,255,0.9); font-family: 'Inter'; font-size: 0.8rem; line-height: 1.4;">
										Stickers & multimedia for every child appointment.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<style>
					@keyframes drift-flat {
						0% { transform: translate(0, 0); }
						50% { transform: translate(15px, -15px); }
						100% { transform: translate(-10px, 10px); }
					}
					@media (max-width: 1024px) {
						.expert-grid { grid-template-columns: 1fr !important; gap: 60px !important; }
					}
				</style>
			</section>

			<!-- Common Objects Grid -->
			<section style="padding: 120px 0; background: #f8fafc;">
				<div class="container">
					<div style="text-align: center; margin-bottom: 80px;">
						<div class="badge">Common Findings</div>
						<h2 class="section-title">Objects Found Stuck in <span class="text-gradient">Ears</span></h2>
						<p style="font-family: 'Inter'; font-size: 1.25rem; color: #64748b; max-width: 700px; margin: 0 auto;">A varied range of clinical findings from our specialized mobile clinic across London.</p>
					</div>
					<div class="common-objects-grid" style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 20px;">
						<?php foreach ( $settings['common_objects'] as $obj ) : ?>
							<div class="object-card">
								<div style="font-size: 2.2rem; color: #3b82f6; margin-bottom: 15px; opacity: 0.8;">
									<i class="<?php echo esc_attr( $obj['object_icon']['value'] ); ?>"></i>
								</div>
								<span style="font-family: 'Outfit'; font-weight: 700; color: #1e293b; font-size: 1rem;"><?php echo esc_html( $obj['object_name'] ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<!-- Methods Section Redesign -->
			<section style="padding: clamp(80px, 15vw, 140px) 0; background: #ffffff; position: relative; overflow: hidden;">
				<div class="container">
					<div class="expert-grid" style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: clamp(40px, 8vw, 100px); align-items: center;">
						<div>
							<div class="badge clinical-excellence-badge"><?php echo esc_html( $settings['methods_badge'] ); ?></div>
							<h2 class="section-title"><?php echo wp_kses_post( str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['methods_title'] ) ); ?></h2>
							<p style="font-size: clamp(1.1rem, 2vw, 1.25rem); line-height: 1.8; color: #64748b; margin-bottom: 40px; font-family: 'Inter';">
								<?php echo esc_html( $settings['methods_desc'] ); ?>
							</p>
							
							<div class="methods-grid" style="display: grid; gap: 30px;">
								<!-- Method 01 -->
								<div class="method-card" style="background: #f8fbff; padding: clamp(25px, 5vw, 40px); border-radius: 40px; border: 1px solid #eff6ff; display: flex; align-items: center; gap: clamp(15px, 3vw, 30px); transition: all 0.4s ease;">
									<div style="width: 60px; height: 60px; background: white; color: #3b82f6; border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; box-shadow: 0 10px 25px rgba(59, 130, 246, 0.1); flex-shrink: 0;">
										<i class="ph-bold ph-needle"></i>
									</div>
									<div>
										<h4 style="font-family: 'Outfit'; font-size: 1.4rem; color: #1e293b; margin-bottom: 5px;">Paediatric Microsuction</h4>
										<p style="margin: 0; color: #64748b; font-size: 0.95rem; line-height: 1.6;">Precision suction to safely lift small objects.</p>
									</div>
								</div>

								<!-- Method 02 -->
								<div class="method-card" style="background: #f0fdfa; padding: clamp(25px, 5vw, 40px); border-radius: 40px; border: 1px solid #ccfbf1; display: flex; align-items: center; gap: clamp(15px, 3vw, 30px); transition: all 0.4s ease;">
									<div style="width: 60px; height: 60px; background: white; color: #0d9488; border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; box-shadow: 0 10px 25px rgba(13, 148, 136, 0.1); flex-shrink: 0;">
										<i class="ph-bold ph-scissors"></i>
									</div>
									<div>
										<h4 style="font-family: 'Outfit'; font-size: 1.4rem; color: #1e293b; margin-bottom: 5px;">Precision ENT Instruments</h4>
										<p style="margin: 0; color: #64748b; font-size: 0.95rem; line-height: 1.6;">Specialized miniature hooks and forceps.</p>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Grommet & Image Card -->
						<div style="position: relative;">
							<div style="margin-bottom: 30px; border-radius: 40px; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.1);">
								<img src="<?php echo esc_url( $settings['methods_image']['url'] ); ?>" alt="Specialized Methods" style="width: 100%; height: 300px; object-fit: cover;">
							</div>

							<div style="background: #f8fafc; border-radius: 50px; padding: clamp(30px, 6vw, 60px); border: 1px solid #f1f5f9; position: relative; z-index: 2; overflow: hidden;">
								<div style="width: 50px; height: 50px; background: white; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.04); display: flex; align-items: center; justify-content: center; color: #3b82f6; font-size: 1.5rem; margin-bottom: 25px;">
									<i class="ph-bold ph-info"></i>
								</div>
								
								<h3 style="font-family: 'Outfit'; font-size: 1.8rem; color: #1e293b; margin-bottom: 20px; line-height: 1.2;"><?php echo wp_kses_post( str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['grommet_title'] ) ); ?></h3>
								<p style="line-height: 1.8; color: #475569; font-size: 1.05rem; font-family: 'Inter'; margin: 0;">
									<?php echo esc_html( $settings['grommet_desc'] ); ?>
								</p>
							</div>
							
							<!-- Urgent Service Floating Note -->
							<div style="position: absolute; top: -15px; right: -10px; background: #1e293b; color: white; padding: 15px 25px; border-radius: 15px; box-shadow: 0 15px 30px rgba(0,0,0,0.2); font-family: 'Outfit'; font-weight: 700; z-index: 3; font-size: 0.85rem;">
								<i class="ph-bold ph-clock" style="margin-right: 8px; color: #60a5fa;"></i> 24/7 Urgent Removal
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Pricing Section -->
			<section style="padding: 140px 0; background: #fcfdfe;">
				<div class="container">
					<div style="max-width: 900px; margin: 0 auto;">
						<div style="text-align: center; margin-bottom: 70px;">
							<div class="badge" style="background: white;">Transparent Pricing</div>
							<h2 class="section-title">Professional <span class="text-gradient">Fees</span></h2>
						</div>
						<div style="display: flex; flex-direction: column; gap: 20px;">
							<?php foreach ( $settings['pricing_rows'] as $row ) : ?>
								<div class="pricing-card-item" style="background: white; padding: 35px 45px; border-radius: 40px; display: flex; justify-content: space-between; align-items: center; border: 1px solid #f1f5f9; box-shadow: 0 10px 30px rgba(0,0,0,0.02); transition: all 0.4s ease;">
									<div style="display: flex; align-items: center; gap: 30px;">
										<div style="width: 56px; height: 56px; background: #eff6ff; color: var(--primary); border-radius: 18px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem;"><i class="ph-bold ph-receipt"></i></div>
										<h4 style="font-family: 'Outfit'; font-weight: 700; font-size: 1.4rem; color: #1e293b; margin: 0;"><?php echo esc_html( $row['service_name'] ); ?></h4>
									</div>
									<div style="font-family: 'Outfit'; font-weight: 800; font-size: 1.75rem; color: var(--primary); background: #f0f9ff; padding: 12px 30px; border-radius: 20px; border: 1px solid rgba(59, 130, 246, 0.1);">
										<?php echo esc_html( $row['service_fee'] ); ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<div style="margin-top: 50px; padding: 40px; background: #f8fafc; border-radius: 40px; text-align: center; color: #64748b; font-size: 1.15rem;">
							<i class="ph-fill ph-info" style="color: var(--primary); margin-right: 12px;"></i>
							<?php echo esc_html( $settings['pricing_footer'] ); ?>
						</div>
					</div>
				</div>
			</section>
		</div>

		<?php
	}
}
