<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Otic_Insights_Advice_Page_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_insights_advice_page';
	}

	public function get_title() {
		return esc_html__( 'Otic Insights & Advice Page', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-post-list';
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
				'default' => 'Clinical Knowledge',
			]
		);

		$this->add_control(
			'hero_title',
			[
				'label' => 'Title',
				'type' => Controls_Manager::TEXTAREA,
				'default' => "Ear Care [Insights & Advice] London",
			]
		);

		$this->add_control(
			'hero_desc',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Expert guidance, clinical updates, and patient stories from London’s leading mobile ENT clinic. Stay informed with the latest in auditory health.',
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

		// --- Blog Grid ---
		$this->start_controls_section(
			'section_blog',
			[
				'label' => esc_html__( 'Blog Posts', 'otic-eye-care' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control( 'post_title', [ 'label' => 'Title', 'type' => Controls_Manager::TEXT ] );
		$repeater->add_control( 'post_category', [ 'label' => 'Category', 'type' => Controls_Manager::TEXT ] );
		$repeater->add_control( 'post_date', [ 'label' => 'Date', 'type' => Controls_Manager::TEXT ] );
		$repeater->add_control( 'post_read_time', [ 'label' => 'Read Time', 'type' => Controls_Manager::TEXT ] );
		$repeater->add_control( 'post_image', [ 'label' => 'Image', 'type' => Controls_Manager::MEDIA ] );
		$repeater->add_control( 'post_link', [ 'label' => 'Link', 'type' => Controls_Manager::URL ] );

		$this->add_control( 'posts', [
			'label' => 'Posts',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				[ 
					'post_title' => 'The Ultimate Guide to Microsuction Ear Wax Removal', 
					'post_category' => 'Clinical Guide', 
					'post_date' => 'May 10, 2026',
					'post_read_time' => '5 min read'
				],
				[ 
					'post_title' => 'Why At-Home Ear Care is Growing in London', 
					'post_category' => 'Patient News', 
					'post_date' => 'May 05, 2026',
					'post_read_time' => '4 min read'
				],
				[ 
					'post_title' => 'Understanding Paediatric Ear Infections: A Parent’s Handbook', 
					'post_category' => 'Paediatrics', 
					'post_date' => 'April 28, 2026',
					'post_read_time' => '8 min read'
				],
			],
			'title_field' => '{{{ post_title }}}',
		]);

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
			
			.blog-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; }
			.post-card { background: white; border-radius: 50px; overflow: hidden; border: 1px solid #f1f5f9; transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); display: flex; flex-direction: column; }
			.post-card:hover { transform: translateY(-15px); box-shadow: 0 40px 100px rgba(0,0,0,0.06); border-color: #3b82f6; }
			
			.post-image-container { position: relative; height: 280px; overflow: hidden; }
			.post-image-container img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease; }
			.post-card:hover .post-image-container img { transform: scale(1.1); }
			
			.post-content { padding: 40px; flex-grow: 1; display: flex; flex-direction: column; }
			.post-meta { display: flex; align-items: center; gap: 15px; margin-bottom: 20px; }
			.post-category { background: #eff6ff; color: #3b82f6; padding: 5px 15px; border-radius: 99px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; }
			.post-date { font-size: 0.85rem; color: #94a3b8; font-weight: 500; }
			
			.post-title { font-family: 'Outfit'; font-size: 1.6rem; color: #1e293b; margin-bottom: 25px; line-height: 1.3; transition: color 0.3s; }
			.post-card:hover .post-title { color: #3b82f6; }
			
			.post-footer { display: flex; align-items: center; justify-content: space-between; padding-top: 25px; border-top: 1px solid #f1f5f9; margin-top: auto; }
			.post-read-time { font-size: 0.85rem; color: #64748b; display: flex; align-items: center; gap: 6px; }
			.post-link { width: 45px; height: 45px; background: #f8fafc; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #1e293b; transition: all 0.3s; }
			.post-card:hover .post-link { background: #3b82f6; color: white; }
		</style>

		<div class="otic-page-container">
			<!-- Standardized Hero Section -->
			<section class="hero" id="insights-hero">
				<div class="hero-video-container">
					<iframe width="1214" height="683"
						src="https://www.youtube.com/embed/<?php echo esc_attr( $settings['video_url'] ); ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo esc_attr( $settings['video_url'] ); ?>&controls=0&rel=0&enablejsapi=1"
						frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
				<div class="hero-overlay"></div>
				<div class="container hero-content">
					<div class="hero-text">
						<div class="badge">
							<i class="ph-fill ph-lightbulb"></i> <?php echo esc_html( $settings['hero_badge'] ); ?>
						</div>
						<h1 class="section-title" style="color: white; font-size: 4.5rem;"><?php echo wp_kses_post( $title ); ?></h1>
						<p style="font-size: 1.5rem; line-height: 1.6; opacity: 0.9; margin-bottom: 40px; font-family: 'Inter'; font-weight: 400;">
							<?php echo esc_html( $settings['hero_desc'] ); ?>
						</p>
						<div class="hero-actions">
							<a href="#latest" class="btn btn-primary btn-lg">Latest Articles <i class="ph-bold ph-arrow-down"></i></a>
							<a href="#subscribe" class="btn btn-outline btn-lg" style="color: white; border-color: white;">Join Newsletter</a>
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

			<!-- Latest Insights Grid -->
			<section id="latest" style="padding: 140px 0; background: #ffffff;">
				<div class="container">
					<div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 80px;">
						<div style="max-width: 600px;">
							<div class="badge">Latest Updates</div>
							<h2 class="section-title">Clinical Articles & <span class="text-gradient">Advice</span></h2>
						</div>
						<div style="display: flex; gap: 15px;">
							<button class="btn btn-outline" style="padding: 12px 25px; border-radius: 99px;">All Posts</button>
							<button class="btn btn-outline" style="padding: 12px 25px; border-radius: 99px;">Clinical</button>
							<button class="btn btn-outline" style="padding: 12px 25px; border-radius: 99px;">News</button>
						</div>
					</div>

					<div class="blog-grid">
						<?php foreach ( $settings['posts'] as $post ) : ?>
							<div class="post-card">
								<div class="post-image-container">
									<img src="<?php echo esc_url( $post['post_image']['url'] ?: 'http://otic-eye-care.local/wp-content/uploads/2026/05/clinical_pricing_transparency.png' ); ?>" alt="<?php echo esc_attr( $post['post_title'] ); ?>">
									<div style="position: absolute; top: 20px; left: 20px;">
										<span class="post-category"><?php echo esc_html( $post['post_category'] ); ?></span>
									</div>
								</div>
								<div class="post-content">
									<div class="post-meta">
										<span class="post-date"><i class="ph-bold ph-calendar" style="margin-right: 5px;"></i> <?php echo esc_html( $post['post_date'] ); ?></span>
									</div>
									<h3 class="post-title"><?php echo esc_html( $post['post_title'] ); ?></h3>
									<div class="post-footer">
										<span class="post-read-time"><i class="ph-fill ph-clock"></i> <?php echo esc_html( $post['post_read_time'] ); ?></span>
										<a href="<?php echo esc_url( $post['post_link']['url'] ?: '#' ); ?>" class="post-link">
											<i class="ph-bold ph-arrow-right"></i>
										</a>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

					<div style="text-align: center; margin-top: 80px;">
						<button class="btn btn-primary" style="padding: 20px 50px; border-radius: 20px; font-weight: 800; font-family: 'Outfit';">Load More Articles</button>
					</div>
				</div>
			</section>

			<!-- Newsletter Section -->
			<section id="subscribe" style="padding: 120px 0; background: #0f172a; position: relative; overflow: hidden;">
				<div style="position: absolute; inset: 0; opacity: 0.03; background-image: radial-gradient(#3b82f6 1px, transparent 1px); background-size: 40px 40px;"></div>
				<div class="container" style="position: relative; z-index: 2;">
					<div style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.05) 100%); padding: 100px; border-radius: 80px; border: 1px solid rgba(255,255,255,0.05); text-align: center;">
						<div style="width: 80px; height: 80px; background: #3b82f6; color: white; border-radius: 25px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 40px; box-shadow: 0 20px 40px rgba(59, 130, 246, 0.3);">
							<i class="ph-fill ph-envelope-simple"></i>
						</div>
						<h2 class="section-title" style="color: white; margin-bottom: 20px;">Join Our Clinical <span class="text-gradient">Newsletter</span></h2>
						<p style="color: #94a3b8; font-size: 1.3rem; max-width: 600px; margin: 0 auto 50px;">Get the latest ear care tips, specialist advice, and exclusive updates delivered to your inbox.</p>
						
						<form style="max-width: 600px; margin: 0 auto; display: flex; gap: 20px;">
							<input type="email" placeholder="Your Email Address" style="flex-grow: 1; padding: 20px 35px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: white; font-family: 'Inter'; font-size: 1.1rem; outline: none;" required>
							<button type="submit" class="btn btn-primary" style="padding: 20px 40px; border-radius: 20px; font-weight: 800; font-family: 'Outfit'; border: none !important; color: white !important;">Subscribe <i class="ph-bold ph-paper-plane-tilt"></i></button>
						</form>
						<p style="margin-top: 30px; color: #64748b; font-size: 0.9rem;">We respect your privacy. Unsubscribe at any time.</p>
					</div>
				</div>
			</section>
		</div>

		<?php
	}
}
