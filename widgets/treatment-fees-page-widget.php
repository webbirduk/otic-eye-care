<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Treatment_Fees_Page_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_treatment_fees_page';
	}

	public function get_title() {
		return esc_html__( 'Otic Treatment Fees Page', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-price-table';
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
				'default' => 'Transparent Pricing',
			]
		);

		$this->add_control(
			'hero_title',
			[
				'label' => 'Title',
				'type' => Controls_Manager::TEXTAREA,
				'default' => "Mobile Ear Clinic [Treatment Fees]",
			]
		);

		$this->add_control(
			'hero_desc',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Experience expert ENT care with no hidden charges. Our transparent fee structure ensures you know exactly what to expect for every home visit across London.',
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

		// --- Fees Section ---
		$this->start_controls_section(
			'section_fees',
			[
				'label' => esc_html__( 'Treatment Fees', 'otic-eye-care' ),
			]
		);

		$repeater_fees = new Repeater();
		$repeater_fees->add_control( 'service_name', [ 'label' => 'Service', 'type' => Controls_Manager::TEXT ] );
		$repeater_fees->add_control( 'service_fee', [ 'label' => 'Fee', 'type' => Controls_Manager::TEXT ] );
		$repeater_fees->add_control( 'is_highlighted', [ 'label' => 'Highlight?', 'type' => Controls_Manager::SWITCHER ] );

		$this->add_control( 'fees_list', [
			'label' => 'Fees',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater_fees->get_controls(),
			'default' => [
				[ 'service_name' => 'Ear wax removal', 'service_fee' => '£175', 'is_highlighted' => 'yes' ],
				[ 'service_name' => 'Foreign body removal', 'service_fee' => '£225' ],
				[ 'service_name' => 'Ear infection treatment', 'service_fee' => '£250' ],
				[ 'service_name' => 'Ear infection follow-up', 'service_fee' => '£150' ],
				[ 'service_name' => 'Children (2-12 years)', 'service_fee' => '+£75' ],
				[ 'service_name' => 'Travel outside London', 'service_fee' => 'from £50' ],
				[ 'service_name' => 'Emergency appointment (7pm–7am)', 'service_fee' => '+£175', 'is_highlighted' => 'yes' ],
				[ 'service_name' => 'Private prescription', 'service_fee' => '+£50' ],
				[ 'service_name' => 'EarCalm spray (5ml)', 'service_fee' => '+£15' ],
				[ 'service_name' => 'Microbiology ear swab', 'service_fee' => '£75' ],
			],
			'title_field' => '{{{ service_name }}}',
		]);

		$this->add_control(
			'fees_footer',
			[
				'label' => 'Footer Information',
				'type' => Controls_Manager::WYSIWYG,
				'default' => '<ul><li>Fees are for one or both ears.</li><li>If no treatment is required, a consultation fee of £100 will be charged.</li><li>Additional patients in the same location from £125.</li></ul>',
			]
		);

		$this->add_control(
			'info_image',
			[
				'label' => 'Information Image',
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'http://otic-eye-care.local/wp-content/uploads/2026/05/clinical_pricing_transparency.png',
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
			
			.fee-dashboard { background: white; border-radius: 60px; box-shadow: 0 50px 120px rgba(0,0,0,0.06); border: 1px solid #f1f5f9; overflow: hidden; }
			.fee-row { display: grid; grid-template-columns: 1fr auto; padding: 30px 60px; border-bottom: 1px solid #f1f5f9; align-items: center; transition: all 0.3s ease; }
			.fee-row:hover { background: #f8fbff; }
			.fee-row:last-child { border-bottom: 0; }
			.fee-highlight { background: #f0f9ff; border-left: 4px solid #3b82f6; }
			.fee-name { font-family: 'Outfit'; font-size: 1.25rem; font-weight: 700; color: #1e293b; }
			.fee-price { font-family: 'Outfit'; font-size: 1.8rem; font-weight: 800; color: #3b82f6; }
			
			.info-card { background: #f8fafc; padding: 60px; border-radius: 50px; border: 1px solid #f1f5f9; margin-top: 50px; }
			.info-card ul { list-style: none; padding: 0; margin: 0; display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px; }
			.info-card li { position: relative; padding-left: 40px; font-family: 'Inter'; font-size: 1.1rem; color: #475569; line-height: 1.6; }
			.info-card li::before { content: '✓'; position: absolute; left: 0; top: 0; width: 24px; height: 24px; background: #3b82f6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.7rem; font-weight: 900; }

			/* Responsive Utilities */
			@media (max-width: 1024px) {
				.hero-content { grid-template-columns: 1fr !important; gap: 60px !important; }
				.hero-text { text-align: center; }
				.hero-actions { justify-content: center; }
				.info-grid { grid-template-columns: 1fr !important; gap: 60px !important; }
				.info-white-card { margin-right: 0 !important; padding: 40px !important; }
				.fee-row { padding: 25px 30px !important; }
			}

			@media (max-width: 768px) {
				.section-title { font-size: 2.5rem !important; }
				.hero-title { font-size: 2.8rem !important; }
				.clinical-transparency-header {
					text-align: center !important;
					display: flex !important;
					flex-direction: column !important;
					align-items: center !important;
				}
				.fee-name { font-size: 1.1rem !important; }
				.fee-price { font-size: 1.5rem !important; }
			}

			@media (max-width: 480px) {
				.section-title { font-size: 2rem !important; }
				.hero-title { font-size: 2.2rem !important; }
				.hero-actions { flex-direction: column; width: 100%; gap: 10px !important; }
				.fee-row { grid-template-columns: 1fr !important; text-align: center; gap: 10px; }
				.fee-price { color: #3b82f6; }
			}
		</style>

		<div class="otic-page-container">
			<!-- Standardized Hero Section -->
			<section class="hero" id="fees-hero">
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
						<h1 class="hero-title" style="color: white; font-size: 4.5rem;"><?php echo wp_kses_post( $title ); ?></h1>
						<p style="font-size: 1.5rem; line-height: 1.6; opacity: 0.9; margin-bottom: 40px; font-family: 'Inter'; font-weight: 400;">
							<?php echo esc_html( $settings['hero_desc'] ); ?>
						</p>
						<div class="hero-actions">
							<a href="#fees" class="btn btn-primary btn-lg">View Fee List <i class="ph-bold ph-arrow-down"></i></a>
							<a href="#booking" class="btn btn-outline btn-lg" style="color: white; border-color: white;">Book Appointment</a>
						</div>
					</div>

					<div class="hero-form-card">
						<h3>Quick Booking</h3>
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
							<button type="submit" class="btn btn-primary">Check Availability <i class="ph-bold ph-calendar-check"></i></button>
						</form>
						<p class="hero-secure-text"><i class="ph-fill ph-shield-check"></i> 100% Secure Process</p>
					</div>
				</div>
			</section>

			<!-- Introduction -->
			<section style="padding: 120px 0; background: #ffffff;">
				<div class="container">
					<div style="max-width: 900px; margin: 0 auto; text-align: center;">
						<div class="badge">Expert Care Anywhere</div>
						<h2 class="section-title">Transparent & Fair <span class="text-gradient">Clinical Fees</span></h2>
						<p style="font-size: 1.3rem; line-height: 1.8; color: #64748b; font-family: 'Inter';">
							At Auris Ear Care, we believe in complete clarity. All treatments are performed by qualified ENT Doctors at your location, ensuring hospital-grade care with a straightforward pricing structure and no hidden charges.
						</p>
					</div>
				</div>
			</section>

			<!-- Fees Dashboard -->
			<section id="fees" style="padding: 140px 0; background: #f8fafc; position: relative; overflow: hidden;">
				<div class="container">
					<div class="fee-dashboard">
						<div style="background: #0f172a; padding: 40px 60px; display: grid; grid-template-columns: 1fr auto; color: white; align-items: center;">
							<h3 style="font-family: 'Outfit'; font-size: 1.8rem; margin: 0;">Treatment (at your location)</h3>
							<span style="font-family: 'Outfit'; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 2px; opacity: 0.6;">Standard Fee</span>
						</div>
						
						<?php foreach ( $settings['fees_list'] as $fee ) : ?>
							<div class="fee-row <?php echo ($fee['is_highlighted'] === 'yes') ? 'fee-highlight' : ''; ?>">
								<div class="fee-name">
									<?php echo esc_html( $fee['service_name'] ); ?>
									<?php if ($fee['is_highlighted'] === 'yes') : ?>
										<span style="background: #3b82f6; color: white; font-size: 0.65rem; padding: 4px 10px; border-radius: 99px; text-transform: uppercase; margin-left: 10px; letter-spacing: 1px; vertical-align: middle;">Popular</span>
									<?php endif; ?>
								</div>
								<div class="fee-price"><?php echo esc_html( $fee['service_fee'] ); ?></div>
							</div>
						<?php endforeach; ?>
					</div>

					<!-- Important Info: High-Fidelity Dashboard Redesign -->
					<div style="margin-top: clamp(60px, 10vw, 100px); position: relative;">
						<div class="info-grid" style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: clamp(40px, 8vw, 80px); align-items: center;">
							<!-- Information Content Column -->
							<div style="position: relative; z-index: 5;">
								<div class="clinical-transparency-header">
									<div class="badge">Clinical Transparency</div>
									<h2 class="section-title" style="font-size: clamp(2.5rem, 6vw, 4rem); margin-bottom: 35px; letter-spacing: -0.03em;">Important <span class="text-gradient">Information</span></h2>
								</div>
								
								<div class="info-white-card" style="background: white; padding: clamp(30px, 5vw, 60px); border-radius: clamp(30px, 5vw, 60px); box-shadow: 0 40px 100px rgba(0,0,0,0.06); border: 1px solid #f1f5f9; position: relative; margin-right: -100px;">
									<div style="display: flex; align-items: center; gap: 15px; margin-bottom: 40px; padding-bottom: 20px; border-bottom: 2px solid #eff6ff;">
										<div style="width: 40px; height: 40px; background: #3b82f6; color: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);">
											<i class="ph-fill ph-scales"></i>
										</div>
										<h4 style="margin: 0; font-family: 'Outfit'; font-size: 1.4rem; font-weight: 800; color: #1e293b; text-transform: uppercase; letter-spacing: 2px;">Standard Clinical <span class="text-gradient">Terms</span></h4>
									</div>
									
									<div style="display: grid; gap: 30px;">
										<div style="display: flex; gap: 20px; align-items: flex-start; padding-bottom: 25px; border-bottom: 1px solid #f1f5f9;">
											<div style="color: #3b82f6; font-size: 1.5rem; margin-top: 2px;"><i class="ph-fill ph-check-circle"></i></div>
											<p style="margin: 0; font-family: 'Inter'; font-size: 1.15rem; color: #475569; line-height: 1.6; font-weight: 500;">Fees quoted are comprehensive for one or both ears as clinically required.</p>
										</div>
										<div style="display: flex; gap: 20px; align-items: flex-start; padding-bottom: 25px; border-bottom: 1px solid #f1f5f9;">
											<div style="color: #3b82f6; font-size: 1.5rem; margin-top: 2px;"><i class="ph-fill ph-check-circle"></i></div>
											<p style="margin: 0; font-family: 'Inter'; font-size: 1.15rem; color: #475569; line-height: 1.6; font-weight: 500;">If no treatment is required, a standard consultation fee of £100 will be charged.</p>
										</div>
										<div style="display: flex; gap: 20px; align-items: flex-start;">
											<div style="color: #3b82f6; font-size: 1.5rem; margin-top: 2px;"><i class="ph-fill ph-check-circle"></i></div>
											<p style="margin: 0; font-family: 'Inter'; font-size: 1.15rem; color: #475569; line-height: 1.6; font-weight: 500;">Multiple patients at the same location can be treated from £125 per additional person.</p>
										</div>
									</div>
								</div>
							</div>

							<!-- Image Column -->
							<div style="position: relative;">
								<div style="position: relative; border-radius: clamp(40px, 8vw, 80px); overflow: hidden; box-shadow: 0 50px 100px rgba(0,0,0,0.12); border: 8px solid white;">
									<img src="<?php echo esc_url( $settings['info_image']['url'] ); ?>" alt="Clinical Transparency" style="width: 100%; height: clamp(300px, 50vh, 700px); object-fit: cover;">
									<div style="position: absolute; inset: 0; background: linear-gradient(to bottom, transparent 60%, rgba(15, 23, 42, 0.4));"></div>
								</div>

								<!-- Floating Assurance Badge -->
								<div style="position: absolute; bottom: -30px; right: -20px; background: #0f172a; color: white; padding: 25px 45px; border-radius: 25px; box-shadow: 0 20px 40px rgba(0,0,0,0.3); z-index: 10; animation: drift 8s infinite alternate;">
									<div style="display: flex; align-items: center; gap: 15px;">
										<div style="color: #3b82f6; font-size: 1.8rem;"><i class="ph-fill ph-shield-check"></i></div>
										<span style="font-family: 'Outfit'; font-weight: 700; font-size: 1.1rem; letter-spacing: 1px; text-transform: uppercase;">Transparent Guarantee</span>
									</div>
								</div>
								
								<!-- Background decorative circle -->
								<div style="position: absolute; top: -40px; right: -40px; width: 150px; height: 150px; background: rgba(59, 130, 246, 0.05); border-radius: 50%; z-index: -1;"></div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- CTA Section -->
			<section style="padding: 120px 0; background: #0f172a; color: white; text-align: center; position: relative; overflow: hidden;">
				<div style="position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(#3b82f6 1px, transparent 1px); background-size: 40px 40px;"></div>
				<div class="container" style="position: relative; z-index: 2;">
					<h2 class="section-title" style="color: white; margin-bottom: 40px;">Ready to Book Your <span class="text-gradient">Home Visit?</span></h2>
					<p style="font-size: 1.3rem; color: #94a3b8; max-width: 700px; margin: 0 auto 50px;">Expert ENT specialists are available across London 24/7 for your convenience.</p>
					<a href="#booking" class="btn btn-primary" style="padding: 25px 60px; font-size: 1.3rem; border-radius: 25px; font-weight: 800; font-family: 'Outfit'; text-decoration: none; display: inline-flex; align-items: center; gap: 15px;">
						Book Now <i class="ph-bold ph-arrow-right"></i>
					</a>
				</div>
			</section>
		</div>

		<?php
	}
}
