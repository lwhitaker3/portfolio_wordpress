<?php
/**
 * Template Name: Resume Page
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <div class="container" id="">
    <!-- Example row of columns -->
    <div class="row page-intro text-center">
      <div class="col-sm-12">
        <i class="icon-briefcase"></i>
        <h1 class="text-center mb-20">Resume</h1>
      </div>

      <div class="col-sm-12 text-center">
        <div class="button">
          <?php
            $file = get_field('pdf_link');
            if( $file ): ?>
              <a target="_blank" class="button-link" href="<?php echo $file['url']; ?>">
              <svg>
                <rect x="0" y="0" fill="none" width="100%" height="100%"></rect>
              </svg>
              PDF Resume
            </a>
          <?php endif; ?>
        </div>
      </div>

    </div>
    <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">
  </div>

  <div class="container page-section" id="">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-sm-12">
        <h2 class="text-center mb-50">Expertise</h2>
      </div>
    </div>
    <?php
    // vars
    $expertise = get_field('expertise');
    if( $expertise ): ?>
      <div class="row expertise">
        <div class="col-sm-6 col-lg-3 mb-50-mobile">
          <i class="icon-layout"></i>
          <h4>UI</h4>
          <p><?php echo $expertise['ui']; ?></p>
        </div>
        <div class="col-sm-6 col-lg-3 mb-50-mobile">
          <i class="icon-touch"></i>
          <h4>IxD</h4>
          <p><?php echo $expertise['ixd']; ?></p>
        </div>
        <div class="col-sm-6 col-lg-3 mb-50-mobile">
          <i class="icon-diagram"></i>
          <h4>IA</h4>
          <p><?php echo $expertise['ia']; ?></p>
        </div>
        <div class="col-sm-6 col-lg-3">
          <i class="icon-graph"></i>
          <h4>Research</h4>
          <p><?php echo $expertise['research']; ?></p>
        </div>

      </div>
    <?php endif; ?>
    <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">

  </div>

  <div class="container page-section resume-skills" id="">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-sm-12">
        <h2 class="text-center mb-50">Skills</h2>
      </div>
    </div>
    <div class="row skills">
      <div class="col-sm-4 mb-50-mobile">
        <h4>Tools</h4>
        <?php if( have_rows('tools') ): ?>
	        <ul>
	          <?php while( have_rows('tools') ): the_row();
          		// vars
          		$skill = get_sub_field('skill');
          		?>

		          <li><?php echo $skill; ?></li>

	          <?php endwhile; ?>

	        </ul>
        <?php endif; ?>

        <!-- <ul>
          <li>Wordpress, Github</li>
          <li>Adobe CC (Id, Ps, Ai, Xd)</li>
          <li>Axure RP, Skecth/InVision</li>
          <li>HTML, CSS/SASS, JavaScript</li>
          <li>PHP/MySQL, Arduino</li>
        </ul> -->
      </div>
      <div class="col-sm-4 mb-50-mobile">
        <h4>Research Methods</h4>
        <?php if( have_rows('research_methods') ): ?>
          <ul>
            <?php while( have_rows('research_methods') ): the_row();
              // vars
              $skill = get_sub_field('skill');
              ?>

              <li><?php echo $skill; ?></li>

            <?php endwhile; ?>

          </ul>
        <?php endif; ?>
        <!-- <ul>
          <li>Surveys, Interviews, Focus Groups</li>
          <li>Competetive Analyses</li>
          <li>Card Sorts, Ethnography Studies</li>
          <li>Heuristic Reviews</li>
          <li>Formative Usabilty Testing</li>
          <li>Summative Usabilty Testing</li>
        </ul> -->
      </div>
      <div class="col-sm-4">
        <h4>Design Documentation</h4>
        <?php if( have_rows('design_documentation') ): ?>
          <ul>
            <?php while( have_rows('design_documentation') ): the_row();
              // vars
              $skill = get_sub_field('skill');
              ?>

              <li><?php echo $skill; ?></li>

            <?php endwhile; ?>

          </ul>
        <?php endif; ?>
        <!-- <ul>
          <li>Wireframes</li>
          <li>Prototypes</li>
          <li>User Stories, Story Boards</li>
          <li>User Flows, Site Maps</li>
          <li>Style Guides</li>
          <li>Personas</li>
        </ul> -->
      </div>
    </div>
    <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">

  </div>

  <div class="container page-section" id="">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-sm-12">
        <h2 class="text-center">Experience and Education</h2>
      </div>
    </div>

    <?php if( have_rows('resume') ): ?>
      <div class="col-sm-12">
        <section id="timeline" class="container">

        <?php while( have_rows('resume') ): the_row();
          // vars
          $date = get_sub_field('date');
          $location = get_sub_field('location');
          $company = get_sub_field('company');
          $position = get_sub_field('position');
          ?>

          <div class="timeline-block">
            <div class="timeline-img picture">
              <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/diamond.svg">
            </div>
            <div class="timeline-content">
              <p><span class="date"><?php echo $date; ?></span><span class="location"><?php echo $location; ?></span></p>
              <h3><?php echo $company; ?><span class="job-position"><?php echo $position; ?></span></h3>
              <?php
							if( have_rows('about') ): ?>
								<ul>
								<?php
								while( have_rows('about') ): the_row();
									?>
									<li><?php the_sub_field('item'); ?></li>
								<?php endwhile; ?>
							  </ul>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>

      </section>
    </div>

    <?php endif; ?>

    <!-- <div class="col-sm-12">
      <section id="timeline" class="container">

        <div class="timeline-block">
          <div class="timeline-img picture">
            <img src="img/diamond.svg" alt="Picture">
          </div>
          <div class="timeline-content">
            <p><span class="date">January 2017 - July 2017</span><span class="location">Miami, FL</span></p>
            <h3>Women of Tomorrow<span class="job-position">UX/Web Designer</span></h3>
            <ul>
              <li>Redesigned existing website and built a custom Wordpress theme.</li>
              <li>Carried out primary research such as interviews and card sorts to inform design and understand their needs as an organization.</li>
              <li>Developed and tested several iterations of prototypes to refine and validate design decisions.</li>
            </ul>
          </div>
        </div>

        <div class="timeline-block">
          <div class="timeline-img picture">
            <img src="img/diamond.svg" alt="Picture">
          </div>
          <div class="timeline-content">
            <p><span class="date">May 2016 - August 2016</span><span class="location">Miami, FL</span</p>
            <h3>SapientRazorfish<span class="job-position">Experience Design Intern</span></h3>
            <ul>
              <li>Worked on multiple projects simultaneously with project teams to develop creative digital solutions for clients including Carnival Cruise Lines, Universal Studios, and Seminole Gaming.</li>
              <li>Created design documents and developed prototypes with Axure to demonstrate proof of concept to present at client meetings.</li>
            </ul>
          </div>
        </div>

        <div class="timeline-block">
          <div class="timeline-img picture">
            <img src="img/diamond.svg" alt="Picture">
          </div>
          <div class="timeline-content">
            <p><span class="date">September 2015 - December 2016</span><span class="location">Coral Gables, FL</span</p>
            <h3>Center for Computational Science<span class="job-position">Web Designer</span></h3>
            <ul>
              <li>Designed wireframes and mockups for microsites and developed final designs with HTML/CSS/Javascript. </li>
            </ul>
          </div>
        </div>

        <div class="timeline-block">
          <div class="timeline-img picture">
            <img src="img/diamond.svg" alt="Picture">
          </div>
          <div class="timeline-content">
            <p><span class="date">August 2015 - May 2017</span><span class="location">Coral Gables, FL</span</p>
            <h3>School of Communication<span class="job-position">UX Research Assistant</span></h3>
            <ul>
              <li>Managed a team of graduate research assistants to develop an exposure reporting system to identify cancer trends among firefighters.</li>
              <li>Conducted generative research to develop requirements for the reporting system and conducted both formative and summative usability tests with firefighters across several agencies.</li>
            </ul>
          </div>
        </div>

        <div class="timeline-block">
          <div class="timeline-img picture">
            <img src="img/diamond.svg" alt="Picture">
          </div>
          <div class="timeline-content">
            <p><span class="date">August 2015 - May 2017</span><span class="location">Coral Gables, FL</span</p>
            <h3>MFA - Interactive Media<span class="job-position">University of Miami</span></h3>
            <ul>
              <li>GPA: 4.0</li>
            </ul>
          </div>
        </div>

        <div class="timeline-block">
          <div class="timeline-img picture">
            <img src="img/diamond.svg" alt="Picture">
          </div>
          <div class="timeline-content">
            <p><span class="date">August 2014 - May 2015</span><span class="location">Miami, FL</span</p>
            <h3>Ibis Yearbook<span class="job-position">Web Editor</span></h3>
            <ul>
              <li>Utilized Wordpress to keep site updated and reorganized structure and content of pages to improve management of site.</li>
            </ul>
          </div>
        </div>

        <div class="timeline-block">
          <div class="timeline-img picture">
            <img src="img/diamond.svg" alt="Picture">
          </div>
          <div class="timeline-content">
            <p><span class="date">August 2011 - May 2015</span><span class="location">Coral Gables, FL</span</p>
            <h3>BSC - Visual Journalism<span class="job-position">University of Miami</span></h3>
            <ul>
              <li>Graduated Magna Cum Laude - GPA: 3.78</li>
            </ul>
          </div>
        </div>


      </section>
    </div> -->



    <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">

  </div>


<?php endwhile; ?>
