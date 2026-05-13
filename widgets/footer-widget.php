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
		<footer class="otic-footer">
			<div class="container">
				<div class="otic-footer-grid">
					
					<!-- Brand Column -->
					<div class="otic-footer-col otic-footer-brand">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="otic-footer-logo-link">
							<img src="<?php echo esc_url( $settings['logo']['url'] ); ?>" alt="Otic Ear Care" class="otic-footer-logo">
						</a>
						<p class="otic-footer-desc">
							<?php echo esc_html( $settings['brand_desc'] ); ?>
						</p>
						<div class="otic-footer-socials">
							<a href="#" class="otic-footer-social-icon"><i class="ph-bold ph-instagram-logo"></i></a>
							<a href="#" class="otic-footer-social-icon"><i class="ph-bold ph-facebook-logo"></i></a>
							<a href="#" class="otic-footer-social-icon"><i class="ph-bold ph-whatsapp-logo"></i></a>
						</div>
					</div>

					<!-- Dynamic Columns -->
					<?php foreach ( $settings['columns'] as $col ) : ?>
						<div class="otic-footer-col otic-footer-nav">
							<h4 class="otic-footer-title"><?php echo esc_html( $col['title'] ); ?></h4>
							<ul class="otic-footer-list">
								<?php foreach ( $col['links'] as $link ) : ?>
									<li><a href="<?php echo esc_url( $link['url']['url'] ); ?>" class="otic-footer-link"><?php echo esc_html( $link['text'] ); ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endforeach; ?>

					<!-- Contact Column -->
					<div class="otic-footer-col otic-footer-contact">
						<h4 class="otic-footer-title">Contact Us</h4>
						<div class="otic-footer-contact-list">
							<div class="otic-footer-contact-item">
								<div class="otic-footer-contact-icon-box" style="background: rgba(57, 134, 255, 0.1); color: #3986FF;"><i class="ph-bold ph-phone"></i></div>
								<div>
									<p class="otic-footer-contact-label">24/7 Hotline</p>
									<p class="otic-footer-contact-value"><?php echo esc_html( $settings['phone'] ); ?></p>
								</div>
							</div>
							<div class="otic-footer-contact-item">
								<div class="otic-footer-contact-icon-box" style="background: rgba(139, 224, 158, 0.1); color: #8BE09E;"><i class="ph-bold ph-envelope"></i></div>
								<div>
									<p class="otic-footer-contact-label">Email Support</p>
									<p class="otic-footer-contact-value"><?php echo esc_html( $settings['email'] ); ?></p>
								</div>
							</div>
							<div class="otic-footer-contact-item">
								<div class="otic-footer-contact-icon-box" style="background: rgba(251, 191, 36, 0.1); color: #FBBF24;"><i class="ph-bold ph-clock"></i></div>
								<div>
									<p class="otic-footer-contact-label">Clinic Hours</p>
									<p class="otic-footer-contact-value"><?php echo esc_html( $settings['hours'] ); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="otic-footer-bottom">
					<p>© <?php echo date('Y'); ?> Otic Ear Care. All rights reserved.</p>
					<div class="otic-footer-legal-links">
						<a href="#" class="otic-footer-legal-link">Privacy Policy</a>
						<a href="#" class="otic-footer-legal-link">Terms of Service</a>
					</div>
				</div>
			</div>
		</footer>
		<?php
	}
}
