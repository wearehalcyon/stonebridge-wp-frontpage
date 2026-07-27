<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-[#F7F3EC]'); ?>>
	<?php wp_body_open(); ?>
	<header class="fixed top-0 left-0 w-full py-6 z-50 duration-200">
		<div class="flex items-center justify-between w-full max-w-[1280px] mx-auto px-4">
            <div class="grid grid-cols-12 gap-4 lg:gap-6 w-full items-center">
                <div class="col-span-6 md:col-span-3 lg:col-span-2 relative z-50">
                    <a href="<?php echo home_url('/'); ?>" class="inline" title="<?php bloginfo('name'); ?>">
                        <?php if (get_field('logo', 'option')) : ?>
                            <img src="<?php echo get_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>">
                        <?php else : ?>
                            <h1 class="font-bold text-[34px] tracking-[0] leading-[37px] text-[#3D2B1F]"><?php bloginfo('name'); ?></h1>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="hidden lg:block lg:col-span-7 xl:col-span-7">
                    <?php
                        wp_nav_menu([
                            'theme_location' => 'primary',
                            'container' => false,
                            'menu_id' => 'primary-menu',
                            'menu_class' => 'primary-menu flex items-center justify-center'
                        ]);
                    ?>
                </div>
                <div class="hidden lg:block col-span-6 md:col-span-9 lg:col-span-3 justify-self-end">
                    <?php if (get_field('cta_title', 'option') && get_field('cta_link', 'option')) : ?>
                        <a href="<?php the_field('cta_link', 'option'); ?>" title="<?php the_field('cta_title', 'option'); ?>" class="group inline-flex items-center justify-center border-2 border-white rounded-[100px] text-white text-md px-8 py-4 duration-200 hover:bg-white hover:text-[#2D2A26]">
                            <?php if (get_field('cta_title', 'option')) : ?>
                                <span class="inline mr-2">
                                <?php the_field('cta_title', 'option'); ?>
                            </span>
                            <?php endif; ?>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="group-hover:stroke-[#2D2A26] duration-200" d="M12 19L19 12L12 5M19 12L5 12" stroke="#F7F3EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
                <!-- Mobile Menu Toggle Button -->
                <div class="col-span-6 md:col-span-9 flex justify-end lg:hidden relative z-50">
                    <button id="mobile-menu-toggle" type="button" class="mobile-menu-toggle relative w-11 h-11 flex flex-col justify-center items-center transition-all duration-300 focus:outline-none" aria-label="Toggle navigation menu" aria-expanded="false">
                        <span class="bar bar-1 w-5 h-[2px] bg-white rounded-full transition-all duration-300"></span>
                        <span class="bar bar-2 w-5 h-[2px] bg-white rounded-full transition-all duration-300 my-1"></span>
                        <span class="bar bar-3 w-5 h-[2px] bg-white rounded-full transition-all duration-300"></span>
                    </button>
                </div>
            </div>
		</div>

        <!-- Mobile Menu Drawer Overlay -->
        <div id="mobile-menu" class="mobile-menu fixed inset-0 bg-[#2D2A26]/95 backdrop-blur-xl z-40 flex flex-col justify-between pt-28 pb-12 px-6 lg:hidden opacity-0 pointer-events-none transition-all duration-300 ease-in-out transform -translate-y-4">
            <div class="flex flex-col items-center justify-center flex-1 my-auto space-y-6">
                <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_id' => 'mobile-primary-menu',
                        'menu_class' => 'mobile-primary-menu flex flex-col items-center justify-center space-y-6 text-center'
                    ]);
                ?>
                <?php if (get_field('cta_title', 'option') && get_field('cta_link', 'option')) : ?>
                    <div class="pt-6">
                        <a href="<?php the_field('cta_link', 'option'); ?>" title="<?php the_field('cta_title', 'option'); ?>" class="group inline-flex items-center justify-center border-2 border-white rounded-[100px] text-white text-lg px-8 py-4 duration-200 hover:bg-white hover:text-[#2D2A26]">
                            <span class="inline mr-2">
                                <?php the_field('cta_title', 'option'); ?>
                            </span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="group-hover:stroke-[#2D2A26] duration-200" d="M12 19L19 12L12 5M19 12L5 12" stroke="#F7F3EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
	</header>