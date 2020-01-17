<?php
global $post;
$post_id = get_the_ID();
get_header();
?>
    <style>
        .entry-title {
            color: white;
            text-align: center;
            padding: .5em;
            margin: 0;
            /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#3b9dd7+0,3a8fd1+50,005596+50,00619f+100 */
            background: #3b9dd7; /* Old browsers */
            background: -moz-linear-gradient(-45deg, #3b9dd7 0%, #3a8fd1 50%, #005596 50%, #00619f 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(-45deg, #3b9dd7 0%, #3a8fd1 50%, #005596 50%, #00619f 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(135deg, #3b9dd7 0%, #3a8fd1 50%, #005596 50%, #00619f 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3b9dd7', endColorstr='#00619f', GradientType=1); /* IE6-9 fallback on horizontal gradient */
            text-transform: uppercase;
            font-weight: bold;
            text-shadow: 0 0 10px #555;
        }

        .project-body {
            display: flex;
            flex-flow: wrap;
        }

        .project-body div {
            flex: 0 1 50%;
        }

        .content h5 {
            margin: 0 0 .5em;
            line-height: 1.25;
        }

        .intro-copy p:last-child {
            margin: 0;
        }

        .intro-copy {
            padding: 2em;
            border: 2px solid #00619f;
            margin: 1em;
        }

        .intro-copy p {
            line-height: 1.35;
            color: black;
            margin: 0 0 1em;
        }

        .bullets ul {
            margin: 0 0 0 2em;
        }

        .bullets {
            /*background: #eee;*/
            color: black;
            line-height: 1.35;
            /*padding: 1em;*/
            margin: 1em;
            border-radius: 0;
            /*box-shadow: 0 0 10px #aaa;*/
        }

        .bullets-container {
            display: flex;
            font-size: .9em;
        }

        .bullets .column-left {
            padding: 1em;
            border-radius: 10px;
            background: #3b9dd7;
            color: white;
        }

        .bullets .column-left span:not(:last-child) {
            margin-bottom: .5em;
        }

        .bullets .column-right {
            padding: .5em !important;
        }

        .bullet-title {
            background: #572c60;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
            padding: .5em 1em !important;
            margin: 0 0 1em;
            border-radius: 10px;
        }

        .column-left {
            border-right: 2px solid;
        }

        .column-left span {
            display: block;
        }

        div#slider a {
            flex: 0 1 48%;
            margin: 0 1% 2%;
            box-shadow: 0 0 10px #aaa;
        }

        div#slider {
            display: flex;
            flex-flow: row wrap;
            justify-content: space-between;
            padding: 2em;
            text-align: center;
        }

        .img-container {
            margin: 1em;
            box-shadow: 0 0 10px #aaa;
        }

        .call-to-action-project p {
            color: white;
            font-weight: normal;
            font-size: 1.25em;
            line-height: 1.2;
            margin: 0;
            flex: 0 1 80%;
            padding: 0 1em;
        }

        .call-to-action-project {
            background: #572c60;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .call-to-action-project a {
            background: #f36b24;
            padding: 2em;
            color: white;
            line-height: 1;
            font-size: 1em;
            font-weight: bold;
            flex: 0 1 20%;
            text-align: center;
            margin: 0 0 0 1em;
        }

        .project-body {
            position: relative;
        }

        .project-body {
            display: flex;
            flex-flow: wrap;
        }

        a.more-link {
            display: none;
        }

        a.fob {
            display: block;
            width: auto;
            background: #00619f;
            color: white;
            padding: .5em 1em;
            font-size: .8em;
            text-transform: uppercase;
            text-align: center;
            margin: 0 auto;
            cursor: pointer;
            transition-duration: 0.5s;
        }

        a.fob:hover{
            background: #572c60;
            box-shadow: 0 0 10px #aaa;
        }

        .full-copy {
            display: none;
        }
    </style>
    <script>
        jQuery(document).ready(function () {
            jQuery('.fob').on('click', function () {
                jQuery('.full-copy').slideToggle('slow');
                jQuery('.half-copy').slideToggle('slow');
            });
        });
    </script>
<?php while ( have_posts() ):
	the_post(); ?>
    <div class="entry-title"><?php the_title(); ?></div>
    <div class="project-body">
        <div class="content">
            <div class="bullets">
                <div class="bullet-title">Project overview</div>
                <div class="bullets-container">
                    <div class="column-left">
                        <span class="year"><strong>YEAR:</strong> <?php echo the_field( 'year' ) ?></span>
                        <span class="client"><strong>CLIENT:</strong> <?php echo the_field( 'client' ) ?></span>
                        <span class="location"><strong>LOCATION:</strong> <?php echo the_field( 'location' ) ?></span>
                        <span class="volunteers"><strong>VOLUNTEER(S):</strong> <?php echo the_field( 'volunteers' ) ?></span>
                    </div>
                    <div class="column-right">
						<?php echo the_field( 'overview_bullets' ) ?>
                    </div>
                </div>
            </div>
            <div class="intro-copy">
                <div class="half-copy">
					<?php the_excerpt(); ?>
                    <a class="fob read-more-proj">Read more</a>
                </div>
                <div class="full-copy">
					<?php the_content(); ?>
                    <a class="fob read-less-proj">Read less</a>
                </div>
            </div>
        </div>
        <div class="featured-img">
            <div class="img-container"><?php the_post_thumbnail( 'full' ); ?></div>
            <div class="gallery">
				<?php
				$images = get_field( 'image_gallery' );

				if ( $images ): ?>
                    <div id="slider" class="flexslider">
						<?php foreach ( $images as $image ): ?>
                            <a target="_blank" href="<?php echo $image['url']; ?>" data-lightbox="image_gallery"><img
                                        src="<?php echo $image['sizes']['medium']; ?>"
                                        alt="<?php echo $image['alt']; ?>"/></a>
						<?php endforeach; ?>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
    <div class="call-to-action-project"><p>We have never refused services to any organization that meets our
            qualifying criteria.</p><a href="/submit-project">Contact Us</a></div>
<?php endwhile; ?>
<?php get_footer(); ?>