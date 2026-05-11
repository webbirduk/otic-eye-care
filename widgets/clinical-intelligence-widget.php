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
		$repeater_cat->add_control( 'name', [ 'label' => 'Name', 'type' => Controls_Manager::TEXT, 'default' => 'General' ] );
		$repeater_cat->add_control( 'icon', [ 'label' => 'Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-fill ph-ear' ] ] );
		$this->add_control( 'categories', [ 'label' => 'Categories', 'type' => Controls_Manager::REPEATER, 'fields' => $repeater_cat->get_controls(), 'default' => [
			[ 'name' => 'Procedure', 'icon' => [ 'value' => 'ph-fill ph-microscope' ] ],
			[ 'name' => 'Safety', 'icon' => [ 'value' => 'ph-fill ph-shield-check' ] ],
			[ 'name' => 'Mobile Service', 'icon' => [ 'value' => 'ph-fill ph-car' ] ],
			[ 'name' => 'Pricing', 'icon' => [ 'value' => 'ph-fill ph-tag' ] ],
		], 'title_field' => '{{{ name }}}' ] );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_faqs',
			[
				'label' => esc_html__( 'FAQs', 'otic-eye-care' ),
			]
		);

		$repeater_faq = new Repeater();
		$repeater_faq->add_control( 'category', [ 'label' => 'Category Name', 'type' => Controls_Manager::TEXT, 'default' => 'Procedure' ] );
		$repeater_faq->add_control( 'question', [ 'label' => 'Question', 'type' => Controls_Manager::TEXT, 'default' => 'Is microsuction safe?' ] );
		$repeater_faq->add_control( 'answer', [ 'label' => 'Answer', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Yes, it is the safest method.' ] );
		$this->add_control( 'faqs', [ 'label' => 'FAQs', 'type' => Controls_Manager::REPEATER, 'fields' => $repeater_faq->get_controls(), 'default' => [
			[ 'category' => 'Procedure', 'question' => 'What is microsuction?', 'answer' => 'Microsuction is the safest and most effective method of ear wax removal. It involves using a clinical-grade microscope and a gentle suction device to remove wax without using water.' ],
			[ 'category' => 'Procedure', 'question' => 'How long does the appointment take?', 'answer' => 'A typical appointment lasts between 20 to 30 minutes, depending on the amount of wax and the complexity of the case.' ],
			[ 'category' => 'Safety', 'question' => 'Does microsuction hurt?', 'answer' => 'No, microsuction is generally painless. Some patients may experience a tickling sensation or a loud noise from the suction, but it is not uncomfortable.' ],
			[ 'category' => 'Mobile Service', 'question' => 'What areas do you cover?', 'answer' => 'We cover all of Greater London and parts of Essex and Kent.' ],
		], 'title_field' => '{{{ question }}}' ] );

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span class="text-gradient">', '</span>'], $settings['title'] );
		$widget_id = $this->get_id();
		?>
		<section class="faq-dashboard" style="padding: 100px 0; background: #ffffff;">
			<div class="container">
				<div style="text-align: center; margin-bottom: 60px;">
					<div class="badge"><?php echo esc_html( $settings['badge_text'] ); ?></div>
					<h2 class="section-title" style="font-size: 3.5rem;"><?php echo wp_kses_post( $title ); ?></h2>
				</div>

				<div class="faq-dashboard-wrapper" style="background: white; border-radius: 40px; box-shadow: 0 40px 100px rgba(0,0,0,0.06); border: 1px solid rgba(0,0,0,0.03); display: grid; grid-template-columns: 320px 1fr; overflow: hidden; min-height: 700px;">
					
					<!-- Sidebar Nav -->
					<div class="faq-nav-container" style="background: #f8fafc; padding: 40px 30px; border-right: 1px solid #f1f5f9;">
						<h4 style="font-family: 'Outfit'; color: #1e293b; margin-bottom: 25px; font-size: 1.2rem; padding-left: 10px;">Categories</h4>
						<div class="faq-nav" id="faq-nav-<?php echo esc_attr( $widget_id ); ?>" style="display: flex; flex-direction: column; gap: 10px;">
							<?php foreach ( $settings['categories'] as $index => $cat ) : ?>
								<button class="faq-nav-item <?php echo $index === 0 ? 'active' : ''; ?>" data-category="<?php echo esc_attr( strtolower( str_replace( ' ', '-', $cat['name'] ) ) ); ?>" style="display: flex; align-items: center; gap: 15px; padding: 15px 20px; border: none; border-radius: 16px; background: transparent; cursor: pointer; transition: all 0.3s; text-align: left; width: 100%;">
									<i class="<?php echo esc_attr( $cat['icon']['value'] ); ?>" style="font-size: 1.4rem; color: #475569;"></i>
									<span style="font-weight: 700; color: #475569; font-size: 1rem;"><?php echo esc_html( $cat['name'] ); ?></span>
								</button>
							<?php endforeach; ?>
						</div>

						<!-- Mini Stats in Sidebar -->
						<div style="margin-top: 60px; padding: 20px; background: white; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.02);">
							<div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px;">
								<i class="ph-fill ph-trend-up" style="color: #8BE09E; font-size: 1.5rem;"></i>
								<span style="font-size: 0.8rem; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 1px;">Success Rate</span>
							</div>
							<p style="font-size: 2rem; font-weight: 900; color: #1e293b; font-family: 'Outfit'; margin: 0;">99.8%</p>
							<div style="height: 6px; background: #f1f5f9; border-radius: 10px; margin-top: 10px; overflow: hidden;">
								<div style="width: 99.8%; height: 100%; background: #8BE09E;"></div>
							</div>
						</div>
					</div>

					<!-- Content Area -->
					<div class="faq-content-container" style="padding: 60px;">
						<?php foreach ( $settings['categories'] as $index => $cat ) : 
							$cat_slug = str_replace( ' ', '-', strtolower( $cat['name'] ) );
							?>
							<div class="faq-category-content <?php echo $index === 0 ? 'active' : ''; ?>" id="cat-<?php echo esc_attr( $cat_slug ); ?>-<?php echo esc_attr( $widget_id ); ?>" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>;">
								<div style="display: flex; align-items: center; gap: 15px; margin-bottom: 40px;">
									<div style="width: 40px; height: 3px; background: var(--primary); border-radius: 10px;"></div>
									<h3 style="font-family: 'Outfit'; font-size: 2rem; color: #1e293b;"><?php echo esc_html( $cat['name'] ); ?> Questions</h3>
								</div>

								<div class="faq-list" style="display: flex; flex-direction: column; gap: 20px;">
									<?php 
									$found = false;
									foreach ( $settings['faqs'] as $faq ) : 
										if ( strtolower( trim( $faq['category'] ) ) === strtolower( trim( $cat['name'] ) ) ) :
											$found = true;
											?>
											<div class="faq-item" style="background: #fcfdfe; border: 1px solid #f1f5f9; border-radius: 20px; overflow: hidden; transition: all 0.3s;">
												<details style="padding: 25px;">
													<summary style="font-weight: 700; font-size: 1.15rem; color: #1e293b; cursor: pointer; display: flex; justify-content: space-between; align-items: center; list-style: none;">
														<?php echo esc_html( $faq['question'] ); ?>
														<i class="ph-bold ph-plus" style="font-size: 1.2rem; color: var(--primary); transition: transform 0.3s;"></i>
													</summary>
													<div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #f1f5f9; color: #64748b; line-height: 1.7; font-size: 1.05rem;">
														<?php echo wp_kses_post( $faq['answer'] ); ?>
													</div>
												</details>
											</div>
										<?php endif; 
									endforeach; 
									if ( ! $found ) echo '<p>No questions found in this category.</p>';
									?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>

		<script>
		document.addEventListener('DOMContentLoaded', function() {
			const navItems = document.querySelectorAll('#faq-nav-<?php echo esc_attr( $widget_id ); ?> .faq-nav-item');
			const contentItems = document.querySelectorAll('#cat-*-<?php echo esc_attr( $widget_id ); ?>'); // This won't work, need better selector

			navItems.forEach(item => {
				item.addEventListener('click', function() {
					const category = this.getAttribute('data-category');
					
					// Update nav
					navItems.forEach(nav => nav.classList.remove('active'));
					this.classList.add('active');

					// Update content
					document.querySelectorAll('[id^="cat-"][id$="-<?php echo esc_attr( $widget_id ); ?>"]').forEach(content => {
						if (content.id === 'cat-' + category + '-<?php echo esc_attr( $widget_id ); ?>') {
							content.style.display = 'block';
						} else {
							content.style.display = 'none';
						}
					});
				});
			});

			// Summary toggle icons
			const details = document.querySelectorAll('.faq-item details');
			details.forEach(detail => {
				detail.addEventListener('toggle', function() {
					const icon = this.querySelector('summary i');
					if (this.open) {
						icon.classList.remove('ph-plus');
						icon.classList.add('ph-minus');
						icon.style.transform = 'rotate(180deg)';
					} else {
						icon.classList.remove('ph-minus');
						icon.classList.add('ph-plus');
						icon.style.transform = 'rotate(0deg)';
					}
				});
			});
		});
		</script>

		<style>
		.faq-nav-item.active {
			background: white !important;
			box-shadow: 0 10px 25px rgba(0,0,0,0.03);
			border: 1px solid rgba(0,0,0,0.01) !important;
		}
		.faq-nav-item.active span {
			color: var(--primary) !important;
		}
		.faq-nav-item.active i {
			color: var(--primary) !important;
		}
		.faq-item details[open] {
			background: white;
			box-shadow: 0 15px 40px rgba(74, 144, 226, 0.08);
			border-color: rgba(74, 144, 226, 0.2);
		}
		</style>
		<?php
	}
}
