<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Gentle_Pediatric_Care_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_gentle_pediatric_care';
	}

	public function get_title() {
		return esc_html__( 'Otic Gentle Pediatric Care', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-heart';
	}

	public function get_categories() {
		return [ 'otic-eye-care' ];
	}

	protected function register_controls() {

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
				'default' => esc_html__( 'Gentle Pediatric Care', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( "Specialist [Children's Ear Care]", 'otic-eye-care' ),
				'description' => esc_html__( "Wrap the gradient part in brackets like [Children's Ear Care]", 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'We offer a specialist children’s ear wax removal service in London, providing a safe, gentle, and stress-free environment for your child.', 'otic-eye-care' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control( 'icon', [ 'label' => 'Icon', 'type' => Controls_Manager::ICONS, 'default' => [ 'value' => 'ph-bold ph-users-three' ] ] );
		$repeater->add_control( 'text', [ 'label' => 'Text', 'type' => Controls_Manager::TEXT, 'default' => 'We provide specialist ear care for children and school-aged students (Ages 3+).' ] );
		$repeater->add_control( 'icon_bg', [ 'label' => 'Icon Background', 'type' => Controls_Manager::COLOR, 'default' => '#fdf2f2' ] );
		$repeater->add_control( 'icon_color', [ 'label' => 'Icon Color', 'type' => Controls_Manager::COLOR, 'default' => '#E09F9C' ] );

		$this->add_control( 'features', [ 'label' => 'Features', 'type' => Controls_Manager::REPEATER, 'fields' => $repeater->get_controls(), 'default' => [
			[ 'text' => 'We provide specialist ear care for children and school-aged students (Ages 3+).', 'icon' => [ 'value' => 'ph-bold ph-users-three' ], 'icon_bg' => '#fdf2f2', 'icon_color' => '#E09F9C' ],
			[ 'text' => 'Experts in ear microsuction for babies, toddlers, and school-aged children.', 'icon' => [ 'value' => 'ph-bold ph-baby' ], 'icon_bg' => '#f0fdf4', 'icon_color' => '#22c55e' ],
			[ 'text' => 'Safe extraction of objects and blockages that cause pain or hearing loss.', 'icon' => [ 'value' => 'ph-bold ph-shield-check' ], 'icon_bg' => '#f0f7ff', 'icon_color' => '#3986FF' ],
		], 'title_field' => '{{{ text }}}' ] );

		$this->add_control(
			'amenity_text',
			[
				'label' => esc_html__( 'Amenity Box Text', 'otic-eye-care' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'We provide longer appointments, distracting multimedia, balloons, and animal stickers to ensure a positive experience.', 'otic-eye-care' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image',
			[
				'label' => esc_html__( 'Image', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'main_image',
			[
				'label' => esc_html__( 'Main Image', 'otic-eye-care' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [ 'url' => plugins_url( '../assets/child_ear_care.png', __FILE__ ) ],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = str_replace( ['[', ']'], ['<span style="background: linear-gradient(135deg, #E09F9C, #F87171); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">', '</span>'], $settings['title'] );
		?>
		<section class="children-section" style="padding: 100px 0; background: #ffffff; overflow: hidden; position: relative;">
			<div style="position: absolute; top: 10%; right: -5%; width: 300px; height: 300px; background: rgba(224, 159, 156, 0.1); filter: blur(80px); border-radius: 50%; z-index: 0;"></div>
			<div style="position: absolute; bottom: 10%; left: -5%; width: 250px; height: 250px; background: rgba(57, 134, 255, 0.08); filter: blur(70px); border-radius: 50%; z-index: 0;"></div>

			<div class="container" style="position: relative; z-index: 2;">
				<div class="text-img-grid" style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 6rem; align-items: center;">
					<div style="position: relative;">
						<div class="children-badge" style="display: inline-flex; align-items: center; gap: 10px; background: rgba(224, 159, 156, 0.1); color: #E09F9C; padding: 10px 25px; border-radius: 100px; font-weight: 800; font-size: 0.85rem; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 25px; border: 1px solid rgba(224, 159, 156, 0.2);">
							<i class="ph-fill ph-heart" style="animation: pulse 2s infinite;"></i>
							<?php echo esc_html( $settings['badge_text'] ); ?>
						</div>

						<h2 style="font-size: 4rem; font-weight: 900; line-height: 1.1; margin-bottom: 25px; color: #1e293b; font-family: 'Outfit';">
							<?php echo wp_kses_post( $title ); ?>
						</h2>

						<p style="font-size: 1.25rem; line-height: 1.7; color: #64748b; margin-bottom: 35px;">
							<?php echo esc_html( $settings['description'] ); ?>
						</p>

						<div style="display: flex; flex-direction: column; gap: 20px; margin-bottom: 40px;">
							<?php foreach ( $settings['features'] as $feature ) : ?>
								<div style="display: flex; align-items: flex-start; gap: 15px;">
									<div style="width: 40px; height: 40px; background: <?php echo esc_attr( $feature['icon_bg'] ); ?>; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: <?php echo esc_attr( $feature['icon_color'] ); ?>; flex-shrink: 0;">
										<i class="<?php echo esc_attr( $feature['icon']['value'] ); ?>" style="font-size: 1.5rem;"></i>
									</div>
									<p style="font-size: 1.1rem; color: #475569; margin: 0;"><?php echo esc_html( $feature['text'] ); ?></p>
								</div>
							<?php endforeach; ?>
						</div>

						<div style="background: white; padding: 25px; border-radius: 24px; border: 1px dashed #E09F9C; box-shadow: 0 10px 30px rgba(224, 159, 156, 0.1); position: relative; overflow: hidden;">
							<div style="position: absolute; top: -10px; right: -10px; color: rgba(224, 159, 156, 0.1); font-size: 5rem; transform: rotate(15deg);">
								<i class="ph-fill ph-balloon"></i>
							</div>
							<p style="margin: 0; font-size: 1.1rem; color: #1e293b; line-height: 1.6; font-weight: 500;">
								<i class="ph-bold ph-game-controller" style="color: #E09F9C; margin-right: 8px;"></i>
								<?php echo esc_html( $settings['amenity_text'] ); ?>
							</p>
						</div>
					</div>

					<div class="img-wrapper" style="position: relative; animation: float 6s ease-in-out infinite;">
						<div style="position: absolute; top: -10%; right: -10%; width: 120%; height: 120%; background: #E09F9C; opacity: 0.15; z-index: 0; animation: blob-morph 8s linear infinite;"></div>
						<div style="position: absolute; top: 10%; left: -5%; color: #E09F9C; font-size: 2.5rem; animation: float 4s ease-in-out infinite; z-index: 2;">
							<i class="ph-fill ph-balloon"></i>
						</div>
						<div style="position: absolute; bottom: 15%; right: -5%; color: #F87171; font-size: 2rem; animation: float 5s ease-in-out infinite; animation-delay: 1s; z-index: 2;">
							<i class="ph-fill ph-heart"></i>
						</div>
						<div style="position: absolute; top: 40%; right: -10%; color: #FBBF24; font-size: 2.2rem; animation: float 7s ease-in-out infinite; animation-delay: 0.5s; z-index: 2;">
							<i class="ph-fill ph-star"></i>
						</div>
						<img src="<?php echo esc_url( $settings['main_image']['url'] ); ?>" alt="Child Ear Care" style="position: relative; z-index: 1; border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; box-shadow: 0 30px 60px rgba(224, 159, 156, 0.3); width: 100%;">
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
