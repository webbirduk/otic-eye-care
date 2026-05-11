<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Clinical_Intelligence_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_clinical_intelligence';
	}

	public function get_title() {
		return esc_html__( 'Otic FAQ Dashboard', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-help-o';
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

		$this->add_control( 'badge_text', [ 'label' => 'Badge Text', 'type' => Controls_Manager::TEXT, 'default' => 'Clinical Intelligence' ] );
		$this->add_control( 'title', [ 'label' => 'Title', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Knowledge [Base & FAQ]', 'description' => 'Wrap in [] for gradient.' ] );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_categories',
			[
				'label' => esc_html__( 'Categories', 'otic-eye-care' ),
			]
		);

		$repeater_cat = new Repeater();
		$repeater_cat->add_control( 'name', [ 'label' => 'Name', 'type' => Controls_Manager::TEXT, 'default' => 'General Services' ] );
		$repeater_cat->add_control( 'icon', [ 'label' => 'Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-fill ph-ear' ] ] );
		$this->add_control( 'categories', [ 'label' => 'Categories', 'type' => Controls_Manager::REPEATER, 'fields' => $repeater_cat->get_controls(), 'default' => [
			[ 'name' => 'General Services', 'icon' => [ 'value' => 'ph-fill ph-first-aid' ] ],
			[ 'name' => 'Procedure Details', 'icon' => [ 'value' => 'ph-fill ph-microscope' ] ],
			[ 'name' => 'Safety & CQC', 'icon' => [ 'value' => 'ph-fill ph-shield-check' ] ],
			[ 'name' => 'Pricing & Booking', 'icon' => [ 'value' => 'ph-fill ph-currency-gbp' ] ],
		], 'title_field' => '{{{ name }}}' ] );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_faqs',
			[
				'label' => esc_html__( 'FAQs', 'otic-eye-care' ),
			]
		);

		$repeater_faq = new Repeater();
		$repeater_faq->add_control( 'category', [ 'label' => 'Category Name', 'type' => Controls_Manager::TEXT, 'default' => 'General Services' ] );
		$repeater_faq->add_control( 'question', [ 'label' => 'Question', 'type' => Controls_Manager::TEXT, 'default' => 'Is microsuction safe?' ] );
		$repeater_faq->add_control( 'answer', [ 'label' => 'Answer', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Yes, it is the safest method.' ] );
		$this->add_control( 'faqs', [ 'label' => 'FAQs', 'type' => Controls_Manager::REPEATER, 'fields' => $repeater_faq->get_controls(), 'default' => [
			[ 'category' => 'General Services', 'question' => 'What ear care services do you provide?', 'answer' => 'We specialize in mobile microsuction ear wax removal, ear infection management, safe foreign body extraction, and dedicated pediatric ear cleaning for children and babies across London.' ],
			[ 'category' => 'General Services', 'question' => 'Are you available 24/7?', 'answer' => 'Yes. We provide standard clinical visits throughout the day and operate a specialized emergency mobile clinic service between 7:00pm and 7:00am daily.' ],
			[ 'category' => 'General Services', 'question' => 'Which areas of London do you cover?', 'answer' => 'We cover the entire Greater London area, including North, East, West, North West, South East, and South West London, as well as the Home Counties.' ],
			[ 'category' => 'General Services', 'question' => 'Do I need a GP referral?', 'answer' => 'No referral is necessary. You can book an appointment directly with our ENT specialists via our website or by calling our clinical team.' ],
			[ 'category' => 'General Services', 'question' => 'Is your service strictly mobile?', 'answer' => 'Yes, we are a dedicated mobile service. We bring hospital-grade microsuction equipment and high-resolution microscopy directly to your home or office for maximum convenience.' ],
			
			[ 'category' => 'Procedure Details', 'question' => 'How does microsuction ear wax removal work?', 'answer' => 'Microsuction uses a gentle suction device and high-resolution microscopy to safely remove wax without water. It is the cleanest and safest method currently available.' ],
			[ 'category' => 'Procedure Details', 'question' => 'How long does a typical appointment take?', 'answer' => 'A comprehensive clinical session typically takes between 20 to 30 minutes, ensuring all wax is removed and your ears are thoroughly examined.' ],
			[ 'category' => 'Procedure Details', 'question' => 'Do I need to use ear drops before my appointment?', 'answer' => 'While 2-3 days of olive oil drops can help soften the wax, our clinicians carry specialized softening tools and can often complete the procedure without prior preparation.' ],
			[ 'category' => 'Procedure Details', 'question' => 'Will ear microsuction be painful?', 'answer' => 'No, microsuction is completely painless. You may hear a suction sound or feel a slight tickle, but most patients find it very comfortable compared to old-fashioned syringing.' ],
			[ 'category' => 'Procedure Details', 'question' => 'Can you treat ear infections during the visit?', 'answer' => 'Yes. Our ENT doctors can diagnose infections on-site and provide targeted intervention, including cleaning the infected area and advising on appropriate medication.' ],
			
			[ 'category' => 'Safety & CQC', 'question' => 'Are you regulated by the CQC?', 'answer' => 'Yes, Auris Ear Care is fully regulated by the Care Quality Commission (CQC), ensuring we meet the highest national standards for safety and quality of care.' ],
			[ 'category' => 'Safety & CQC', 'question' => 'Are your clinicians qualified ENT doctors?', 'answer' => 'Yes, all our clinicians are highly experienced Ear, Nose, and Throat (ENT) specialists with medical degrees and extensive clinical backgrounds.' ],
			[ 'category' => 'Safety & CQC', 'question' => 'Is microsuction safe for children and babies?', 'answer' => 'Absolutely. We have a dedicated pediatric service and our clinicians are experts in gentle microsuction for babies, toddlers, and older children.' ],
			[ 'category' => 'Safety & CQC', 'question' => 'What are your sterilization protocols?', 'answer' => 'We use single-use, sterile clinical instruments for every patient. Our specialists follow strict hospital-grade hygiene protocols to ensure absolute patient safety.' ],
			[ 'category' => 'Safety & CQC', 'question' => 'What if I have a perforated eardrum?', 'answer' => 'Microsuction is the only safe method for wax removal if you have a perforated eardrum, as it does not involve the use of water or pressure.' ],
			
			[ 'category' => 'Pricing & Booking', 'question' => 'How much does ear wax removal cost?', 'answer' => 'Our pricing is transparent and includes the home visit. Please check our booking page for the current flat-rate fee for standard clinical sessions.' ],
			[ 'category' => 'Pricing & Booking', 'question' => 'Is there an additional fee for emergencies?', 'answer' => 'Yes, emergency mobile appointments between 7:00pm and 7:00am incur an additional clinical fee of £175 on top of the standard treatment cost.' ],
			[ 'category' => 'Pricing & Booking', 'question' => 'Are there travel charges for my area?', 'answer' => 'Travel within our core London zones is included. Some areas may incur a £50-£100 travel fee, while locations outside London have a minimum £175 travel charge.' ],
			[ 'category' => 'Pricing & Booking', 'question' => 'How do I book an appointment?', 'answer' => 'You can book instantly via our secure online system by clicking \'Book Now\', or call our clinical team directly for emergency or same-day visits.' ],
			[ 'category' => 'Pricing & Booking', 'question' => 'How quickly can you visit?', 'answer' => 'We often provide same-day appointments. For emergencies, our mobile team aims to reach you as quickly as possible, usually within a few hours.' ],
		], 'title_field' => '{{{ question }}}' ] );
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span class="london-text-gradient">', '</span>'], $settings['title'] );
		$widget_id = $this->get_id();
		?>
		<section class="faq-dashboard" style="padding: 120px 0; background: #fdfdfd; position: relative; overflow: hidden;">
			<div class="container" style="position: relative; z-index: 2;">
				<div class="faq-dashboard-wrapper" style="display: grid; grid-template-columns: 0.7fr 1.3fr; gap: 40px; background: white; border-radius: 40px; padding: 60px; box-shadow: 0 40px 100px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05);">

					<!-- Title Header -->
					<div style="grid-column: 1 / -1; margin-bottom: 40px;">
						<div style="display: inline-flex; align-items: center; gap: 10px; background: white; padding: 10px 25px; border-radius: 100px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); color: #3986FF; font-weight: 800; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px; border: 1px solid rgba(0,0,0,0.05);">
							<i class="ph-fill ph-info"></i> <?php echo esc_html( $settings['badge_text'] ); ?>
						</div>
						<h2 class="faq-main-title" style="font-size: 3.5rem; font-weight: 900; color: #1e293b; font-family: 'Outfit'; margin: 0; line-height: 1.1;">
							<?php echo wp_kses_post( $title ); ?>
						</h2>
					</div>

					<!-- Left: Navigation Sidebar -->
					<div class="faq-nav-container" style="border-right: 1px solid #f1f5f9; padding-right: 40px;">
						<div class="faq-nav" id="faq-nav-<?php echo esc_attr( $widget_id ); ?>" style="display: flex; flex-direction: column; gap: 10px;">
							<?php foreach ( $settings['categories'] as $index => $cat ) : ?>
								<button class="faq-nav-btn <?php echo $index === 0 ? 'active' : ''; ?>" data-category="<?php echo esc_attr( strtolower( str_replace( ' ', '-', $cat['name'] ) ) ); ?>">
									<i class="<?php echo esc_attr( $cat['icon']['value'] ); ?>"></i> <?php echo esc_html( $cat['name'] ); ?>
								</button>
							<?php endforeach; ?>
						</div>

						<!-- Mini CTA Card -->
						<div style="margin-top: 60px; padding: 30px; background: #1e293b; border-radius: 30px; color: white; position: relative; overflow: hidden;">
							<div style="position: absolute; bottom: -20px; right: -20px; font-size: 8rem; opacity: 0.05; transform: rotate(-15deg); pointer-events: none;">
								<i class="ph-fill ph-phone-call"></i>
							</div>
							<h4 style="margin: 0 0 10px; font-size: 1.2rem; font-family: 'Outfit';">Need Help?</h4>
							<p style="margin: 0 0 20px; font-size: 0.9rem; opacity: 0.7;">Speak with an ENT clinician 24/7 for emergency care.</p>
							<a href="tel:+447852992668" style="color: #3986FF; font-weight: 800; text-decoration: none; display: flex; align-items: center; gap: 8px; font-size: 1.1rem; transition: all 0.3s;">
								+44 7852 992 668 <i class="ph-bold ph-arrow-up-right"></i>
							</a>
						</div>
					</div>

					<!-- Right: Accordion Content Area -->
					<div class="faq-content-container" style="padding-left: 20px;">
						<?php foreach ( $settings['categories'] as $index => $cat ) : 
							$cat_slug = str_replace( ' ', '-', strtolower( $cat['name'] ) );
							?>
							<div class="faq-category-content <?php echo $index === 0 ? 'active' : ''; ?>" id="cat-<?php echo esc_attr( $cat_slug ); ?>-<?php echo esc_attr( $widget_id ); ?>" style="display: <?php echo $index === 0 ? 'flex' : 'none'; ?>; flex-direction: column; gap: 15px;">
								<?php 
								foreach ( $settings['faqs'] as $faq ) : 
									if ( strtolower( trim( $faq['category'] ) ) === strtolower( trim( $cat['name'] ) ) ) :
										?>
										<details class="dashboard-faq-item">
											<summary>
												<span><?php echo esc_html( $faq['question'] ); ?></span>
												<i class="ph-bold ph-caret-down"></i>
											</summary>
											<div class="faq-dash-content">
												<?php echo wp_kses_post( $faq['answer'] ); ?>
											</div>
										</details>
									<?php endif; 
								endforeach; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>

		<script>
		document.addEventListener('DOMContentLoaded', function() {
			const navItems = document.querySelectorAll('#faq-nav-<?php echo esc_attr( $widget_id ); ?> .faq-nav-btn');
			
			navItems.forEach(item => {
				item.addEventListener('click', function() {
					const category = this.getAttribute('data-category');
					
					// Update nav
					navItems.forEach(nav => nav.classList.remove('active'));
					this.classList.add('active');

					// Update content
					document.querySelectorAll('[id^="cat-"][id$="-<?php echo esc_attr( $widget_id ); ?>"]').forEach(content => {
						if (content.id === 'cat-' + category + '-<?php echo esc_attr( $widget_id ); ?>') {
							content.style.display = 'flex';
						} else {
							content.style.display = 'none';
						}
					});
				});
			});
		});
		</script>

		<style>
		.faq-nav-btn {
			width: 100%;
			padding: 20px 25px;
			border: none;
			background: transparent;
			border-radius: 20px;
			display: flex;
			align-items: center;
			gap: 15px;
			font-size: 1rem;
			font-weight: 700;
			color: #64748b;
			cursor: pointer;
			transition: all 0.3s;
			text-align: left;
			font-family: 'Outfit';
		}

		.faq-nav-btn i { font-size: 1.2rem; }
		.faq-nav-btn.active { background: #f0f7ff; color: #3986FF; }
		.faq-nav-btn:hover:not(.active) { background: #f8fafc; color: #1e293b; }

		.dashboard-faq-item {
			background: #f8fafc;
			border-radius: 25px;
			overflow: hidden;
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			border: 1px solid transparent;
		}

		.dashboard-faq-item summary {
			padding: 25px 30px;
			font-size: 1.15rem;
			font-weight: 700;
			color: #1e293b;
			cursor: pointer;
			display: flex;
			justify-content: space-between;
			align-items: center;
			list-style: none;
			font-family: 'Outfit';
		}

		.dashboard-faq-item summary i { transition: transform 0.4s; color: #3986FF; flex-shrink: 0; }
		.dashboard-faq-item[open] {
			background: white;
			border-color: #3986FF;
			box-shadow: 0 15px 40px rgba(57, 134, 255, 0.08);
			transform: scale(1.01);
		}
		.dashboard-faq-item[open] summary i { transform: rotate(180deg); }

		.faq-dash-content {
			padding: 0 30px 30px 30px;
			color: #64748b;
			font-size: 1.1rem;
			line-height: 1.7;
			animation: fadeInDown 0.4s ease-out;
		}

		@keyframes fadeInDown {
			from { opacity: 0; transform: translateY(-10px); }
			to { opacity: 1; transform: translateY(0); }
		}

		@media (max-width: 1024px) {
			.faq-dashboard-wrapper {
				display: flex !important;
				flex-direction: column !important;
				padding: 30px 20px !important;
				gap: 0 !important;
				border-radius: 30px !important;
			}
			.faq-nav-container {
				border-right: none !important;
				padding-right: 0 !important;
				padding-bottom: 20px !important;
				border-bottom: 1px solid #f1f5f9 !important;
				margin-bottom: 25px !important;
				width: 100% !important;
			}
			.faq-nav {
				display: grid !important;
				grid-template-columns: 1fr 1fr !important;
				gap: 10px !important;
			}
			.faq-nav-btn {
				padding: 15px 10px !important;
				font-size: 0.85rem !important;
				text-align: center !important;
				flex-direction: column !important;
				gap: 8px !important;
				background: #f8fafc !important;
			}
			.faq-content-container { padding-left: 0 !important; }
		}
		</style>
		<?php
	}
}

