<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Footer_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_footer';
	}

	public function get_title() {
		return esc_html__( 'Otic Footer', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-footer';
	}

	public function get_categories() {
		return [ 'otic-eye-care' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_brand',
			[
				'label' => esc_html__( 'Brand', 'otic-eye-care' ),
			]
		);

		$this->add_control( 'logo', [ 'label' => 'Logo', 'type' => Controls_Manager::MEDIA, 'default' => [ 'url' => plugins_url( '../assets/user_logo_2.png', __FILE__ ) ] ] );
		$this->add_control( 'brand_desc', [ 'label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Providing expert, mobile ear wax removal and clinical ear care across London. Available 24/7 for your convenience.' ] );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_links',
			[
				'label' => esc_html__( 'Link Columns', 'otic-eye-care' ),
			]
		);

		$repeater_col = new Repeater();
		$repeater_col->add_control( 'title', [ 'label' => 'Column Title', 'type' => Controls_Manager::TEXT, 'default' => 'Quick Links' ] );
		
		$repeater_link = new Repeater();
		$repeater_link->add_control( 'text', [ 'label' => 'Link Text', 'type' => Controls_Manager::TEXT, 'default' => 'Link' ] );
		$repeater_link->add_control( 'url', [ 'label' => 'Link URL', 'type' => Controls_Manager::URL, 'default' => [ 'url' => '#' ] ] );
		
		$repeater_col->add_control( 'links', [ 'label' => 'Links', 'type' => Controls_Manager::REPEATER, 'fields' => $repeater_link->get_controls(), 'title_field' => '{{{ text }}}' ] );

		$this->add_control( 'columns', [ 'label' => 'Columns', 'type' => Controls_Manager::REPEATER, 'fields' => $repeater_col->get_controls(), 'default' => [
			[ 'title' => 'Treatments', 'links' => [
				[ 'text' => 'Ear Wax Removal', 'url' => [ 'url' => '#' ] ],
				[ 'text' => 'Ear Infections', 'url' => [ 'url' => '#' ] ],
				[ 'text' => 'Foreign Body Removal', 'url' => [ 'url' => '#' ] ],
				[ 'text' => "Children's Ear Care", 'url' => [ 'url' => '#' ] ],
			] ],
			[ 'title' => 'London Coverage', 'links' => [
				[ 'text' => 'Central London', 'url' => [ 'url' => '#' ] ],
				[ 'text' => 'North London', 'url' => [ 'url' => '#' ] ],
				[ 'text' => 'East London', 'url' => [ 'url' => '#' ] ],
				[ 'text' => 'West London', 'url' => [ 'url' => '#' ] ],
			] ],
		], 'title_field' => '{{{ title }}}' ] );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_contact',
			[
				'label' => esc_html__( 'Contact Info', 'otic-eye-care' ),
			]
		);

		$this->add_control( 'phone', [ 'label' => 'Phone', 'type' => Controls_Manager::TEXT, 'default' => '+44 7852 992 668' ] );
		$this->add_control( 'email', [ 'label' => 'Email', 'type' => Controls_Manager::TEXT, 'default' => 'info@oticearcare.co.uk' ] );
		$this->add_control( 'hours', [ 'label' => 'Hours', 'type' => Controls_Manager::TEXT, 'default' => '24/7 Availability' ] );

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<footer style="background: #000000; color: white; padding: 100px 0 40px 0; font-family: 'Inter', sans-serif;">
			<div class="container">
				<div style="display: grid; grid-template-columns: 1.5fr 1fr 1fr 1.2fr; gap: 60px;">
					
					<!-- Brand Column -->
					<div>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: inline-block; margin-bottom: 30px;">
							<img src="<?php echo esc_url( $settings['logo']['url'] ); ?>" alt="Otic Ear Care" style="height: 70px;">
						</a>
						<p style="color: rgba(255,255,255,0.6); line-height: 1.7; font-size: 1.05rem; margin-bottom: 30px;">
							<?php echo esc_html( $settings['brand_desc'] ); ?>
						</p>
						<div style="display: flex; gap: 15px;">
							<a href="#" style="width: 40px; height: 40px; background: rgba(255,255,255,0.05); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; transition: 0.3s;"><i class="ph-bold ph-instagram-logo"></i></a>
							<a href="#" style="width: 40px; height: 40px; background: rgba(255,255,255,0.05); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; transition: 0.3s;"><i class="ph-bold ph-facebook-logo"></i></a>
							<a href="#" style="width: 40px; height: 40px; background: rgba(255,255,255,0.05); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; transition: 0.3s;"><i class="ph-bold ph-whatsapp-logo"></i></a>
						</div>
					</div>

					<!-- Dynamic Columns -->
					<?php foreach ( $settings['columns'] as $col ) : ?>
						<div>
							<h4 style="font-family: 'Outfit'; font-size: 1.3rem; margin-bottom: 30px;"><?php echo esc_html( $col['title'] ); ?></h4>
							<ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 15px;">
								<?php foreach ( $col['links'] as $link ) : ?>
									<li><a href="<?php echo esc_url( $link['url']['url'] ); ?>" style="color: rgba(255,255,255,0.6); text-decoration: none; transition: 0.3s; font-size: 1rem;"><?php echo esc_html( $link['text'] ); ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endforeach; ?>

					<!-- Contact Column -->
					<div>
						<h4 style="font-family: 'Outfit'; font-size: 1.3rem; margin-bottom: 30px;">Contact Us</h4>
						<div style="display: flex; flex-direction: column; gap: 20px;">
							<div style="display: flex; gap: 15px; align-items: flex-start;">
								<div style="width: 40px; height: 40px; background: rgba(57, 134, 255, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #3986FF; flex-shrink: 0;"><i class="ph-bold ph-phone"></i></div>
								<div>
									<p style="margin: 0; font-size: 0.8rem; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 1px;">24/7 Hotline</p>
									<p style="margin: 0; font-size: 1.1rem; font-weight: 700;"><?php echo esc_html( $settings['phone'] ); ?></p>
								</div>
							</div>
							<div style="display: flex; gap: 15px; align-items: flex-start;">
								<div style="width: 40px; height: 40px; background: rgba(139, 224, 158, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #8BE09E; flex-shrink: 0;"><i class="ph-bold ph-envelope"></i></div>
								<div>
									<p style="margin: 0; font-size: 0.8rem; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 1px;">Email Support</p>
									<p style="margin: 0; font-size: 1.1rem; font-weight: 700;"><?php echo esc_html( $settings['email'] ); ?></p>
								</div>
							</div>
							<div style="display: flex; gap: 15px; align-items: flex-start;">
								<div style="width: 40px; height: 40px; background: rgba(251, 191, 36, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #FBBF24; flex-shrink: 0;"><i class="ph-bold ph-clock"></i></div>
								<div>
									<p style="margin: 0; font-size: 0.8rem; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 1px;">Clinic Hours</p>
									<p style="margin: 0; font-size: 1.1rem; font-weight: 700;"><?php echo esc_html( $settings['hours'] ); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div style="margin-top: 80px; padding-top: 30px; border-top: 1px solid rgba(255,255,255,0.05); display: flex; justify-content: space-between; align-items: center; color: rgba(255,255,255,0.4); font-size: 0.9rem;">
					<p>© <?php echo date('Y'); ?> Otic Ear Care. All rights reserved.</p>
					<div style="display: flex; gap: 30px;">
						<a href="#" style="color: inherit; text-decoration: none;">Privacy Policy</a>
						<a href="#" style="color: inherit; text-decoration: none;">Terms of Service</a>
					</div>
				</div>
			</div>
		</footer>
		<?php
	}
}
