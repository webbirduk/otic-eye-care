<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Otic_Single_Post_Page_Widget extends Widget_Base {

	public function get_name() {
		return 'otic_single_post_page';
	}

	public function get_title() {
		return esc_html__( 'Otic Single Post Page', 'otic-eye-care' );
	}

	public function get_icon() {
		return 'eicon-single-post';
	}

	public function get_categories() {
		return [ 'otic-eye-care' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_layout',
			[
				'label' => esc_html__( 'Layout Settings', 'otic-eye-care' ),
			]
		);

		$this->add_control(
			'show_sidebar',
			[
				'label' => 'Show Related Posts?',
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		if ( ! is_singular( 'post' ) ) {
			echo 'This widget is designed for single post pages.';
			return;
		}

		global $post;
		$post_id = get_the_ID();
		$featured_img = get_the_post_thumbnail_url( $post_id, 'full' ) ?: 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&q=80&w=2000';
		$categories = get_the_category();
		$cat_name = ! empty( $categories ) ? $categories[0]->name : 'Clinical Insight';
		?>

		<style>
			.single-post-container { font-family: 'Inter', sans-serif; background: #ffffff; }
			.container { max-width: 1100px; margin: 0 auto; padding: 0 20px; }
			.post-hero { position: relative; height: 70vh; min-height: 500px; display: flex; align-items: center; justify-content: center; overflow: hidden; background: #0f172a; }
			.post-hero-bg { position: absolute; inset: 0; background: url('<?php echo esc_url( $featured_img ); ?>') center/cover no-repeat; transform: scale(1.05); }
			.post-hero-overlay { position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(15, 23, 42, 0.4) 0%, rgba(15, 23, 42, 0.9) 100%); }
			
			.post-hero-content { position: relative; z-index: 5; text-align: center; color: white; max-width: 800px; padding: 0 20px; }
			.post-badge { display: inline-block; padding: 8px 20px; background: rgba(59, 130, 246, 0.2); backdrop-filter: blur(10px); color: #60a5fa; border-radius: 99px; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 30px; border: 1px solid rgba(255, 255, 255, 0.1); }
			.post-main-title { font-family: 'Outfit'; font-size: clamp(2.5rem, 6vw, 4.5rem); font-weight: 800; line-height: 1.1; margin-bottom: 30px; letter-spacing: -0.03em; }
			
			.post-meta-hero { display: flex; align-items: center; justify-content: center; gap: 30px; font-size: 1rem; color: rgba(255,255,255,0.7); font-weight: 500; }
			.post-meta-hero span { display: flex; align-items: center; gap: 8px; }
			.post-meta-hero i { color: #3b82f6; font-size: 1.2rem; }

			.post-body-wrap { padding: 100px 0; background: white; position: relative; }
			.post-content-inner { max-width: 800px; margin: 0 auto; font-size: 1.25rem; line-height: 1.8; color: #334155; }
			.post-content-inner h2, .post-content-inner h3 { font-family: 'Outfit'; color: #1e293b; margin: 60px 0 25px; font-weight: 800; }
			.post-content-inner h2 { font-size: 2.5rem; letter-spacing: -0.02em; border-left: 6px solid #3b82f6; padding-left: 25px; }
			.post-content-inner p { margin-bottom: 30px; }
			.post-content-inner blockquote { margin: 60px 0; padding: 50px; background: #f8fafc; border-radius: 40px; border-left: 8px solid #3b82f6; font-style: italic; color: #1e293b; font-size: 1.5rem; position: relative; }
			.post-content-inner blockquote::after { content: '\"'; position: absolute; top: 20px; left: 30px; font-size: 8rem; opacity: 0.05; font-family: 'Outfit'; }

			.post-share { display: flex; flex-direction: column; gap: 15px; position: sticky; top: 100px; height: fit-content; }
			.share-btn { width: 50px; height: 50px; background: #f1f5f9; border-radius: 15px; display: flex; align-items: center; justify-content: center; color: #1e293b; transition: all 0.3s; font-size: 1.3rem; }
			.share-btn:hover { background: #3b82f6; color: white; transform: scale(1.1); }

			.author-card { margin-top: 100px; padding: 60px; background: #f8fafc; border-radius: 50px; display: flex; gap: 40px; align-items: center; border: 1px solid #f1f5f9; }
			.author-avatar { width: 120px; height: 120px; border-radius: 40px; object-fit: cover; box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
			.author-info h4 { font-family: 'Outfit'; font-size: 1.6rem; margin-bottom: 10px; color: #1e293b; }
			.author-info p { margin: 0; color: #64748b; line-height: 1.6; }

			@media (max-width: 1024px) {
				.post-main-title { font-size: 3.5rem; }
				.author-card { flex-direction: column; text-align: center; padding: 40px; }
			}

			@media (max-width: 768px) {
				.post-hero { height: 60vh; }
				.post-main-title { font-size: 2.8rem; }
				.post-meta-hero { flex-direction: column; gap: 15px; }
				.post-content-inner { font-size: 1.15rem; }
				.post-content-inner h2 { font-size: 2rem; padding-left: 20px; }
			}
		</style>

		<div class="single-post-container">
			<!-- Post Hero -->
			<section class="post-hero">
				<div class="post-hero-bg"></div>
				<div class="post-hero-overlay"></div>
				<div class="post-hero-content">
					<div class="post-badge"><?php echo esc_html( $cat_name ); ?></div>
					<h1 class="post-main-title"><?php the_title(); ?></h1>
					<div class="post-meta-hero">
						<span><i class="ph-fill ph-user-circle"></i> <?php the_author(); ?></span>
						<span><i class="ph-fill ph-calendar-blank"></i> <?php echo get_the_date(); ?></span>
						<span><i class="ph-fill ph-clock"></i> 6 Min Read</span>
					</div>
				</div>
			</section>

			<!-- Post Content -->
			<div class="post-body-wrap">
				<div class="container" style="display: grid; grid-template-columns: 1fr; gap: 80px;">
					<article class="post-content-inner">
						<?php the_content(); ?>

						<!-- Author Section -->
						<div class="author-card">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 120, '', '', [ 'class' => 'author-avatar' ] ); ?>
							<div class="author-info">
								<h4>Written by <?php the_author(); ?></h4>
								<p><?php echo get_the_author_meta( 'description' ) ?: 'Otic Eye Care Clinical Specialist providing expert guidance on auditory health and mobile ENT services across London.'; ?></p>
							</div>
						</div>
					</article>
				</div>
			</div>

			<!-- Newsletter Section -->
			<section id="subscribe" style="padding: clamp(60px, 12vw, 120px) 0; background: #0f172a; position: relative; overflow: hidden;">
				<div style="position: absolute; inset: 0; opacity: 0.03; background-image: radial-gradient(#3b82f6 1px, transparent 1px); background-size: 40px 40px;"></div>
				<div class="container" style="position: relative; z-index: 2;">
					<div class="newsletter-wrap" style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.05) 100%); padding: clamp(40px, 10vw, 100px); border-radius: 80px; border: 1px solid rgba(255,255,255,0.05); text-align: center;">
						<div style="width: 60px; height: 60px; background: #3b82f6; color: white; border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 30px; box-shadow: 0 15px 30px rgba(59, 130, 246, 0.3);">
							<i class="ph-fill ph-envelope-simple"></i>
						</div>
						<h2 style="font-family: 'Outfit'; color: white; margin-bottom: 20px; font-size: clamp(2rem, 5vw, 3rem); font-weight: 800;">Join Our Clinical <span style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Newsletter</span></h2>
						<p style="color: #94a3b8; font-size: clamp(1rem, 2vw, 1.25rem); max-width: 600px; margin: 0 auto 50px;">Get the latest ear care tips and specialist advice delivered to your inbox.</p>
						
						<form style="max-width: 600px; margin: 0 auto; display: flex; gap: 20px; flex-wrap: wrap;">
							<input type="email" placeholder="Your Email Address" style="flex-grow: 1; padding: 20px 35px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: white; font-family: 'Inter'; font-size: 1.1rem; outline: none; min-width: 250px;" required>
							<button type="submit" class="btn btn-primary" style="padding: 20px 40px; border-radius: 20px; font-weight: 800; font-family: 'Outfit'; background: #3b82f6; border: none; color: white; cursor: pointer; flex-grow: 1;">Subscribe Now <i class="ph-bold ph-paper-plane-tilt"></i></button>
						</form>
					</div>
				</div>
			</section>
		</div>

		<?php
	}
}
