<?php
/**
 * Template name: Frontpage
 */
get_header();
?>
	<div class="flex wrap justify-center items-center relative z-1 min-h-[100vh]" style="background: url('<?php echo get_field('background'); ?>') no-repeat center; background-size: cover;">
        <div class="block w-full max-w-[1280px] mx-auto px-4 text-white">
            <?php if (get_field('title')) : ?>
                <h1 class="text-[36px] lg:text-[56px] xl:text-[77px] text-center lg:text-left font-semibold tracking-[6px] leading-[36px] lg:leading-[56px] xl:leading-[77px]">
                    <?php the_field('title'); ?>
                </h1>
            <?php endif; ?>
            <?php if (get_field('description')) : ?>
                <div class="text-md font-extralight mt-10 w-full lg:max-w-[500px] text-center lg:text-left">
                    <?php the_field('description'); ?>
                </div>
            <?php endif; ?>
            <div class="grid grid-cols-12 gap-4 lg:gap-6 w-full mt-7 items-center">
                <div class="col-span-12 lg:col-span-6 block lg:flex wrap items-center">
                    <?php if (get_field('first_button_title') && get_field('first_button_link')) : ?>
                        <a href="<?php the_field('first_button_link'); ?>" title="<?php the_field('first_button_title'); ?>" class="group w-full lg:w-auto flex lg:inline-flex items-center justify-center border-2 border-white rounded-[100px] bg-white text-[#2D2A26] text-md font-medium px-8 py-4 duration-200 hover:bg-white/70">
                            <span class="inline mr-2">
                                <?php the_field('first_button_title'); ?>
                            </span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="stroke-[#2D2A26] duration-200" d="M12 19L19 12L12 5M19 12L5 12" stroke="#F7F3EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if (get_field('second_button_title') && get_field('second_button_link')) : ?>
                        <a href="<?php the_field('second_button_link'); ?>" title="<?php the_field('second_button_title'); ?>" class="w-full lg:w-auto flex lg:inline-flex items-center justify-center border-2 border-white rounded-[100px] text-white text-md font-medium px-8 py-4 mt-4 lg:mt-0 ml-0 lg:ml-4 duration-200 hover:bg-white hover:text-[#2D2A26]">
                            <?php the_field('second_button_title'); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="col-span-6 hidden lg:flex flex-wrap justify-end">
                    <?php if (get_field('flag')) : $flag_img = get_field('flag'); ?>
                        <img src="<?php echo $flag_img['url']; ?>" alt="<?php the_field('flag_text'); ?>" width="<?php echo $flag_img['width']; ?>" height="<?php echo $flag_img['height']; ?>">
                    <?php endif; ?>
                    <?php if (get_field('flag_text')) : ?>
                        <div class="block w-full text-[24px] text-right">
                            <?php the_field('flag_text'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
	</div>
    <?php if (have_rows('advantages')) : ?>
        <div class="w-full max-w-[1280px] mx-auto px-4 grid grid-cols-12 gap-4 lg:gap-6 py-6 border-b border-[#CDC7BF]">
            <?php while (have_rows('advantages')) : the_row(); ?>
                <div class="col-span-6 xl:col-span-3 p-4 lg:p-6 text-left lg:text-center">
                    <h4 class="text-xl lg:text-[29px] font-medium">
                        <?php the_sub_field('title'); ?>
                    </h4>
                    <span class="block leading-[18px] mt-2">
                        <?php the_sub_field('text'); ?>
                    </span>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php if (have_rows('cards')) : ?>
        <div class="w-full max-w-[1280px] mx-auto px-4 grid grid-cols-12 gap-x-4 lg:gap-x-6 py-6 mt-20">
            <?php if (get_field('title_01')) : ?>
                <h2 class="col-span-12 text-[29px] lg:text-[48px] leading-[34px] lg:leading-[50px] font-medium uppercase w-full max-w-[900px]">
                    <?php the_field('title_01'); ?>
                </h2>
            <?php endif; ?>
            <?php if (get_field('subtitle_01')) : ?>
                <div class="col-span-12 lg:col-span-6 mt-3">
                    <?php the_field('subtitle_01'); ?>
                </div>
            <?php endif; ?>
            <?php if (get_field('all_services_link')) : ?>
                <div class="text-left lg:text-right col-span-12 lg:col-span-6 mt-3">
                    <a href="<?php the_field('all_services_link'); ?>" class="inline underline hover:no-underline" title="View all services">
                        View all services
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="w-full max-w-[1280px] mx-auto px-4 py-6 mt-4">
            <!-- Swiper Container for Mobile / Grid for Desktop -->
            <div class="cards-swiper overflow-hidden lg:!overflow-visible">
                <div class="swiper-wrapper lg:!transform-none lg:grid lg:grid-cols-12 lg:gap-6">
                    <?php while (have_rows('cards')) : the_row(); ?>
                        <div class="swiper-slide !h-auto col-span-12 lg:col-span-6 xl:col-span-4">
                            <div class="group h-full flex flex-col justify-between border border-[#CDC7BF] rounded-2xl p-6 transition-colors duration-300
                                    bg-[#F5F3EE] text-[#2D2A26]
                                    [.swiper-slide-active_&]:bg-[#2D2A26] [.swiper-slide-active_&]:border-[#2D2A26] [.swiper-slide-active_&]:text-[#F7F3EC]
                                    lg:hover:bg-[#2D2A26] lg:hover:border-[#2D2A26] lg:hover:text-[#F7F3EC]">
                                <div>
                                    <?php if ($icon = get_sub_field('icon')) : ?>
                                        <div class="inline-flex p-3 rounded-md transition-colors duration-300
                                                bg-[#E5E0D8] text-[#2D2A26]
                                                [.swiper-slide-active_&]:bg-[#F7F3EC]
                                                lg:group-hover:bg-[#F7F3EC]">
                                            <?php echo $icon; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($title = get_sub_field('title')) : ?>
                                        <h4 class="block mt-3 text-[24px] font-medium leading-tight">
                                            <?php echo esc_html($title); ?>
                                        </h4>
                                    <?php endif; ?>

                                    <?php if ($text = get_sub_field('text')) : ?>
                                        <div class="block mt-3 mb-4 leading-[20px] transition-colors duration-300
                                                text-stone-600
                                                [.swiper-slide-active_&]:text-[#F7F3EC]/80
                                                lg:group-hover:text-[#F7F3EC]/80">
                                            <?php echo $text; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php if ($link = get_sub_field('link')) : ?>
                                    <div>
                                        <a href="<?php echo esc_url($link); ?>" class="underline hover:no-underline font-medium" title="Learn more">
                                            Learn more
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="mt-6 flex flex-col gap-4 lg:hidden">
                <?php if (get_field('button_title_01') && get_field('button_link_01')) : ?>
                    <a href="<?php the_field('button_link_01'); ?>" title="<?php the_field('button_title_01'); ?>" class="group w-full flex items-center justify-center gap-2 border-2 border-[#2D2A26] rounded-[100px] bg-[#2D2A26] text-[#F7F3EC] text-md font-medium px-8 py-4 duration-200 hover:bg-transparent hover:text-[#2D2A26]">
                        <span><?php the_field('button_title_01'); ?></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="stroke-[#F7F3EC] group-hover:stroke-[#2D2A26] duration-200" d="M12 19L19 12L12 5M19 12L5 12" stroke="#F7F3EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                <?php endif; ?>
                <div class="flex items-center justify-between pt-2">
                    <div class="flex items-center gap-3">
                        <button class="cards-prev w-12 h-12 rounded-full border border-[#2D2A26]/40 flex items-center justify-center hover:bg-stone-200 transition-colors cursor-pointer shrink-0">
                            <svg class="w-4 h-4 text-[#2D2A26]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button class="cards-next w-12 h-12 rounded-full border border-[#2D2A26]/40 flex items-center justify-center hover:bg-stone-200 transition-colors cursor-pointer shrink-0">
                            <svg class="w-4 h-4 text-[#2D2A26]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                    <div class="w-auto cards-fraction text-xl font-medium tracking-tight"></div>
                </div>
            </div>
            <?php if (get_field('button_title_01') && get_field('button_link_01')) : ?>
                <div class="hidden lg:block mt-8 text-right">
                    <a href="<?php the_field('button_link_01'); ?>" title="<?php the_field('button_title_01'); ?>" class="group inline-flex items-center justify-center gap-2 border-2 border-[#2D2A26] rounded-[100px] bg-[#2D2A26] text-[#F7F3EC] text-md font-medium px-8 py-4 duration-200 hover:bg-transparent hover:text-[#2D2A26]">
                        <span><?php the_field('button_title_01'); ?></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="stroke-[#F7F3EC] group-hover:stroke-[#2D2A26] duration-200" d="M12 19L19 12L12 5M19 12L5 12" stroke="#F7F3EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if (get_field('background_01')) : ?>
        <div class="w-full max-w-[1280px] mx-auto mt-[60px] xl:mt-[168px] px-4">
            <div class="px-[40px] lg:px-[84px] py-[40px] lg:py-[86px] relative overflow-hidden rounded-2xl text-[#F7F3EC] after:content-[''] after:absolute after:z-1 after:top-0 after:left-0 after:w-full after:h-full after:bg-gradient-to-r after:from-[#2D2A26] after:to-transparent" style="background: url('<?php echo get_field('background_01'); ?>') no-repeat center; background-size: cover;">
                <div class="block relative z-10 w-full max-w-[420px]">
                    <h2 class="text-[29px] lg:text-[48px] leading-[24px] lg:leading-[50px] font-medium">
                        <?php the_field('title_02'); ?>
                    </h2>
                    <p class="font-extralight lg:font-normal mt-2 lg:mt-0">
                        <?php the_field('subtitle_02'); ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (have_rows('experience_list')) : ?>
        <div class="w-full max-w-[1280px] mx-auto mt-4 px-4">
            <?php while (have_rows('experience_list')) : the_row(); $index = get_row_index(); ?>
                <div class="grid grid-cols-12 gap-x-4 items-center py-12 px-8<?php echo $index != 1 ? ' border-t border-[#CDC7BF]' : null; ?>">
                    <div class="col-span-12 xl:col-span-4 text-[24px] font-medium">
                        <?php the_sub_field('title'); ?>
                    </div>
                    <div class="col-span-12 xl:col-span-4">
                        <?php the_sub_field('text'); ?>
                    </div>
                    <div class="hidden xl:block col-span-4 text-right">
                        <span class="inline-block w-3 h-3 rounded-lg bg-[#2D2A26]"></span>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php if (get_field('button_title_02') && get_field('button_link_02')) : ?>
                <div class="mt-4 text-right">
                    <a href="<?php the_field('button_link_02'); ?>" title="<?php the_field('button_title_02'); ?>" class="group w-full lg:w-auto flex lg:inline-flex items-center justify-center border-2 border-[#2D2A26] rounded-[100px] text-md font-medium px-20 py-4 duration-200 hover:bg-[#2D2A26] hover:text-[#F7F3EC]">
                        <span class="inline mr-2"><?php the_field('button_title_02'); ?></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="stroke-[#2D2A26] group-hover:stroke-[#F7F3EC] duration-200" d="M12 19L19 12L12 5M19 12L5 12" stroke="#F7F3EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if (have_rows('team')) : ?>
        <div class="w-full max-w-[1280px] mx-auto mt-[84px] px-4">
            <h2 class="text-[48px] font-medium uppercase">
                <?php the_field('title_03'); ?>
            </h2>
            <p>
                <?php the_field('subtitle_03'); ?>
            </p>
            <div class="grid grid-cols-12 gap-6 pb-20 border-b border-[#CDC7BF]">
                <?php
                    while (have_rows('team')) : the_row();
                        $photo = get_sub_field('photo');
                        $name = get_sub_field('name');
                        $words = explode(' ', trim($name));
                        $initials = mb_substr($words[0], 0, 1);
                        if (isset($words[1])) {
                            $initials .= mb_substr($words[1], 0, 1);
                        }
                ?>
                    <div class="col-span-12 lg:col-span-6 xl:col-span-4 border-b xl:border-0 border-[#CDC7BF] pb-10 xl:pb-0">
                        <div class="flex items-center justify-center h-[480px]">
                            <?php if ($photo) : ?>
                                <img src="<?php echo $photo['url']; ?>" class="w-full h-full object-cover object-top" alt="<?php the_sub_field('name'); ?>" width="<?php echo $photo['width']; ?>" height="<?php echo $photo['height']; ?>">
                            <?php else : ?>
                                <span class="inline-block text-[77px] font-medium">
                                    <?php echo esc_html(mb_strtoupper($initials)); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <?php if (get_sub_field('type')) : ?>
                            <span class="block text-[#6F6A64] italic text-[20px] mt-3">
                                <?php the_sub_field('type'); ?>
                            </span>
                        <?php endif; ?>
                        <?php if (get_sub_field('name')) : ?>
                            <h3 class="block text-[#2D2A26] text-[29px] mt-1 font-medium">
                                <?php the_sub_field('name'); ?>
                            </h3>
                        <?php endif; ?>
                        <?php if (get_sub_field('description')) : ?>
                            <div class="block text-[#2D2A26] mt-2">
                                <?php the_sub_field('description'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (have_rows('slider_04')) : ?>
        <div class="w-full max-w-[1280px] mx-auto px-4 py-8 lg:py-12">
            <div class="flex flex-col lg:flex-row justify-between items-start mb-6 lg:mb-12 gap-3 lg:gap-6">
                <h2 class="text-[28px] sm:text-[36px] xl:text-[48px] leading-[1.08] font-semibold tracking-tight text-[#1c1b18] uppercase max-w-none lg:max-w-[500px]">
                    <?php the_field('title_04'); ?>
                </h2>
                <?php if (get_field('subtitle_04')) : ?>
                    <span class="text-sm font-medium text-[#6e6c64] max-w-[340px] leading-relaxed">
                    <?php the_field('subtitle_04'); ?>
                </span>
                <?php endif; ?>
            </div>
            <div class="swiper process-text-slider overflow-hidden mb-6 lg:mb-8">
                <div class="swiper-wrapper">
                    <?php while (have_rows('slider_04')) : the_row(); ?>
                        <div class="swiper-slide !h-auto">
                            <div class="h-full border border-[#CDC7BF] rounded-2xl p-6 bg-[#F5F3EE] lg:bg-transparent lg:border-none lg:p-0">
                                <div class="grid grid-cols-1 lg:grid-cols-12 gap-2 lg:gap-6 items-start">
                                    <?php if ($subtitle = get_sub_field('subtitle')) : ?>
                                        <div class="hidden lg:block lg:col-span-4 text-[15px] font-medium text-[#6e6c64]">
                                            <?php echo esc_html($subtitle); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="lg:col-span-8 xl:col-span-7">
                                        <h3 class="text-[20px] lg:text-[28px] font-semibold text-[#1c1b18] mb-2 lg:mb-4 leading-snug">
                                            <?php the_sub_field('title'); ?>
                                        </h3>
                                        <p class="text-[14px] lg:text-[16px] leading-relaxed text-[#5a5953]">
                                            <?php the_sub_field('text'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 lg:gap-6 mb-6 lg:mb-8">
                <div class="flex items-center justify-between lg:justify-start gap-4 order-1 lg:order-1">
                    <div class="flex items-center gap-3">
                        <button class="process-prev w-12 h-12 rounded-full border border-[#1c1b18]/40 lg:border-[#1c1b18] flex items-center justify-center hover:bg-[#1c1b18] hover:text-white transition-colors shrink-0">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
                        </button>
                        <button class="process-next w-12 h-12 rounded-full border border-[#1c1b18]/40 lg:border-[#1c1b18] flex items-center justify-center hover:bg-[#1c1b18] hover:text-white transition-colors shrink-0">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                        </button>
                    </div>
                    <div class="w-auto process-pagination flex items-center gap-2 text-xl font-medium"></div>
                </div>
                <?php if (get_field('button_title_04') && get_field('button_link_04')) : ?>
                    <div class="order-2 lg:order-2">
                        <a href="<?php the_field('button_link_04'); ?>" title="<?php the_field('button_title_04'); ?>" class="w-full lg:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 rounded-full bg-[#2a2825] text-white text-base font-medium hover:bg-[#1c1b18] transition-colors">
                            <span><?php the_field('button_title_04'); ?></span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="relative swiper-scrollbar process-scrollbar !mb-0 top-[1px] border-t border-[#1c1b18]/15"></div>
            <div class="swiper process-cards-slider overflow-hidden">
                <div class="swiper-wrapper">
                    <?php while (have_rows('slider_04')) : the_row(); ?>
                        <div class="swiper-slide">
                            <img src="<?php echo get_template_directory_uri() . '/assets/svg/bridge.svg'; ?>" class="w-full h-auto block" alt="Bridge Item">
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

        </div>
    <?php endif; ?>
    <?php if (have_rows('slider_05')) : ?>
        <div class="w-full max-w-[1280px] mx-auto mt-[68px] px-4">
            <h2 class="text-[29px] xl:text-[48px] leading-[1.1] mb-6 xl:mb-0 uppercase font-medium">
                <?php the_field('title_05'); ?>
            </h2>
            <div class="relative">
                <div class="swiper reviews-slider">
                    <div class="swiper-wrapper">
                        <?php while (have_rows('slider_05')) : the_row(); ?>
                            <div class="swiper-slide">
                                <div class="review-card">
                                    <div class="review-header">
                                        <div class="review-text order-2 xl:order-1"><?php the_sub_field('text'); ?></div>
                                        <div class="quote-icon order-1 xl:order-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5729 4.55804C18.3379 6.97604 20.4296 9.79054 20.8479 13.0015C21.4994 18 17.0294 20.4465 14.7644 18.2485C12.4994 16.0505 13.8569 13.26 15.4969 12.497C17.1369 11.734 18.1399 12 17.9649 10.9805C17.7899 9.96103 15.4569 7.13554 13.4069 5.81954C13.3344 5.75769 13.2881 5.67055 13.2775 5.57581C13.2669 5.48108 13.2928 5.38587 13.3499 5.30954L13.8569 4.65004C14.0769 4.36404 14.2879 4.37503 14.5729 4.55753M4.65993 4.55804C8.42493 6.97604 10.5166 9.79054 10.9349 13.0015C11.5869 18 7.11693 20.4465 4.85193 18.2485C2.58693 16.0505 3.94443 13.26 5.58493 12.497C7.22543 11.734 8.22793 12 8.05293 10.9805C7.87792 9.96103 5.54443 7.13554 3.49443 5.81954C3.42196 5.75762 3.37579 5.67044 3.36529 5.57571C3.3548 5.48098 3.38077 5.38581 3.43793 5.30954L3.94443 4.65004C4.16442 4.36404 4.37543 4.37503 4.65993 4.55753" fill="#2D2A26"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="review-footer">
                                        <h4 class="author-name"><?php the_sub_field('name'); ?></h4>
                                        <span class="location"><?php the_sub_field('location'); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="swiper-scrollbar"></div>
                <div class="slider-controls">
                    <div class="nav-buttons">
                        <button class="btn-prev">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
                        </button>
                        <button class="btn-next">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                        </button>
                    </div>
                    <div class="custom-pagination"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (get_field('image_06')) : ?>
        <div class="w-full max-w-[1280px] mx-auto mt-12 md:mt-[80px] px-4">
            <div class="flex flex-col items-start lg:pl-[42%] mb-8 md:mb-12">
                <?php if (get_field('title_06')) : ?>
                    <h2 class="text-3xl md:text-[56px] lg:text-[64px] font-medium uppercase leading-tight text-[#1c1b18]">
                        <?php the_field('title_06'); ?>
                    </h2>
                <?php endif; ?>

                <?php if (get_field('subtitle_06')) : ?>
                    <p class="text-base md:text-[20px] font-medium text-[#4a4943] mt-2">
                        <?php the_field('subtitle_06'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="relative flex flex-col lg:flex-row items-center lg:items-end justify-between gap-8">
                <div class="z-20 w-full max-w-[320px] bg-[#f4f2ea] border border-[#e2e0d8] rounded-2xl p-6 shadow-sm flex flex-col items-center text-center order-2 lg:order-1">
                    <?php if (get_field('flag_06')) : ?>
                        <div class="w-12 h-8 mb-4 overflow-hidden rounded-sm shadow-xs flex items-center justify-center">
                            <img src="<?php the_field('flag_06'); ?>" alt="Canada Flag" class="w-full h-full object-cover">
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('address_06')) : ?>
                        <div class="block mb-3">
                            <?php the_field('address_06'); ?>
                        </div>
                    <?php endif; ?>
                    <a href="<?php the_field('button_link_06'); ?>" title="<?php the_field('button_title_06'); ?>" target="_blank" rel="noopener noreferrer" class="inline-block w-full py-2.5 px-4 rounded-full border border-[#1c1b18] text-sm font-medium text-[#1c1b18] hover:bg-[#1c1b18] hover:text-white transition-colors duration-200">
                        <?php the_field('button_title_06'); ?>
                    </a>
                </div>
                <div class="relative w-full lg:w-[60%] flex justify-end order-1 lg:order-2">
                    <svg class="hidden xl:block absolute inset-0 w-[200px] rotate-[90deg] lg:rotate-0 lg:w-[1000px] top-[248px] lg:top-0 left-[268px] lg:left-[-350px] h-full pointer-events-none z-10" preserveAspectRatio="none" viewBox="0 0 100 100">
                        <line x1="0" y1="80" x2="85" y2="93.5" stroke="#1c1b18" stroke-width="1.5" vector-effect="non-scaling-stroke"></line>
                    </svg>
                    <img src="<?php echo esc_url(get_field('image_06')); ?>" alt="Map of Canada" class="w-full h-auto object-contain z-0 relative">
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (have_rows('faqs')) : ?>
        <div class="w-full max-w-[1280px] mx-auto mt-12 md:mt-[168px] px-4">
            <div class="grid grid-cols-12 gap-x-6">
                <div class="col-span-12 lg:col-span-4">
                    <h2 class="text-[64px] font-medium uppercase"><?php the_field('title_07'); ?></h2>
                    <div class="block">
                        <?php while (have_rows('faqs')) : the_row(); $index = get_row_index(); ?>
                            <div class="flex py-1 duration-200 cursor-pointer hover:opacity-100 <?php echo $index == 1 ? ' opacity-100' : 'opacity-40'; ?>" data-window="<?php echo 'window-' . $index; ?>">
                                <?php if (get_sub_field('icon')) : ?>
                                    <img src="<?php the_sub_field('icon') ?>" alt="Icon">
                                <?php endif; ?>
                                <span class="inline-block w-[calc(100%-24px)] pl-2 text-[20px] font-medium">
                                    <?php the_sub_field('name'); ?>
                                </span>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-8">
                    <?php while (have_rows('faqs')) : the_row(); $index = get_row_index(); ?>
                        <div data-window-id="window-<?php echo $index; ?>" class="<?php echo $index == 1 ? 'block' : 'hidden' ?>">
                            <?php if (have_rows('sub_faqs')) : ?>
                                <div class="block">
                                    <?php while (have_rows('sub_faqs')) : the_row(); $index = get_row_index(); ?>
                                        <div class="group relative border-b border-[#CDC7BF] duration-200">
                                            <div class="flex items-center justify-between text-[24px] font-medium py-8 cursor-pointer group-hover:text-[#49453f] duration-200" data-faq-question>
                                                <span class="w-[calc(100%-56px)] pr-4">
                                                    <?php the_sub_field('question'); ?>
                                                </span>
                                                <span class="inline-flex w-[56px] h-[56px] rounded-full items-center justify-center text-[32px] leading-none font-light border border-[#2D2A26] transition-transform duration-300 select-none" data-faq-question-symbol>
                                                    <?php echo $index == 1 ? '-' : '+'; ?>
                                                </span>
                                            </div>
                                            <div class="pt-0 pb-8 text-[#49453f] text-[18px] leading-relaxed"
                                                 data-faq-answer
                                                 style="<?php echo $index == 1 ? 'display: block;' : 'display: none;'; ?>">
                                                <?php the_sub_field('answer'); ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="w-full max-w-[1280px] mx-auto mt-12 md:mt-[84px] px-4">
        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-12 xl:col-span-5">
                <h2 class="text-[29px] font-medium uppercase">
                    Contact
                </h2>
                <?php if (get_field('address')) : ?>
                    <div class="flex w-full mb-3">
                        <div class="w-[24px] h-[24px]">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 10C20 16.5 12 22 12 22C12 22 4 16.5 4 10C4 7.87827 4.84285 5.84344 6.34315 4.34315C7.84344 2.84285 9.87827 2 12 2C14.1217 2 16.1566 2.84285 17.6569 4.34315C19.1571 5.84344 20 7.87827 20 10Z" stroke="#2D2A26" stroke-width="2"/>
                                <path d="M15 10C15 10.7956 14.6839 11.5587 14.1213 12.1213C13.5587 12.6839 12.7956 13 12 13C11.2044 13 10.4413 12.6839 9.87868 12.1213C9.31607 11.5587 9 10.7956 9 10C9 9.20435 9.31607 8.44129 9.87868 7.87868C10.4413 7.31607 11.2044 7 12 7C12.7956 7 13.5587 7.31607 14.1213 7.87868C14.6839 8.44129 15 9.20435 15 10Z" stroke="#2D2A26" stroke-width="2"/>
                            </svg>
                        </div>
                        <div class="block w-[calc(100%-24px)] ml-2">
                            <span class="font-normal underline">
                                <?php the_field('address'); ?>
                            </span>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (get_field('phone')) : ?>
                    <div class="flex w-full mb-3">
                        <div class="w-[24px] h-[24px]">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.54 5C6.6 5.89 6.75 6.76 6.99 7.59L5.79 8.79C5.38 7.59 5.12 6.32 5.03 5H6.54ZM16.4 17.02C17.25 17.26 18.12 17.41 19 17.47V18.96C17.68 18.87 16.41 18.61 15.2 18.21L16.4 17.02ZM7.5 3H4C3.45 3 3 3.45 3 4C3 13.39 10.61 21 20 21C20.55 21 21 20.55 21 20V16.51C21 15.96 20.55 15.51 20 15.51C18.76 15.51 17.55 15.31 16.43 14.94C16.331 14.903 16.2256 14.886 16.12 14.89C15.86 14.89 15.61 14.99 15.41 15.18L13.21 17.38C10.3755 15.9303 8.06966 13.6245 6.62 10.79L8.82 8.59C9.1 8.31 9.18 7.92 9.07 7.57C8.69132 6.41789 8.4989 5.21274 8.5 4C8.5 3.45 8.05 3 7.5 3Z" fill="#2D2A26"/>
                            </svg>
                        </div>
                        <div class="block w-[calc(100%-24px)] ml-2">
                            <a href="tel:<?php the_field('phone'); ?>" title="Phone" class="font-normal underline hover:no-underline">
                                <?php the_field('phone'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (get_field('email')) : ?>
                    <div class="flex w-full mb-3">
                        <div class="w-[24px] h-[24px]">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6ZM20 6L12 11L4 6H20ZM20 18H4V8L12 13L20 8V18Z" fill="#2D2A26"/>
                            </svg>
                        </div>
                        <div class="block w-[calc(100%-24px)] ml-2">
                            <a href="mailto:<?php the_field('email'); ?>" title="Email" class="font-normal underline hover:no-underline">
                                <?php the_field('email'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (get_field('hours')) : ?>
                    <div class="flex w-full mb-3">
                        <div class="w-[24px] h-[24px]">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2.5C17.2469 2.5 21.5 6.75314 21.5 12C21.5 17.2469 17.2469 21.5 12 21.5C6.75314 21.5 2.5 17.2469 2.5 12C2.5 6.75314 6.75314 2.5 12 2.5ZM12 3.5C9.74566 3.5 7.58332 4.3952 5.98926 5.98926C4.3952 7.58332 3.5 9.74566 3.5 12C3.5 14.2543 4.3952 16.4167 5.98926 18.0107C7.58332 19.6048 9.74566 20.5 12 20.5C14.2543 20.5 16.4167 19.6048 18.0107 18.0107C19.6048 16.4167 20.5 14.2543 20.5 12C20.5 9.74566 19.6048 7.58332 18.0107 5.98926C16.4167 4.3952 14.2543 3.5 12 3.5ZM12 6.5C12.1223 6.50003 12.2406 6.54475 12.332 6.62598C12.4235 6.70733 12.4817 6.81983 12.4961 6.94141L12.5 7.0127V11.793L15.3535 14.6465C15.4428 14.7363 15.4941 14.8568 15.498 14.9834C15.5019 15.1104 15.458 15.2348 15.374 15.3301C15.29 15.4253 15.1723 15.485 15.0459 15.4971C14.9225 15.5088 14.7994 15.4734 14.7002 15.3994L14.6309 15.3379L11.6465 12.3535C11.57 12.2769 11.521 12.1774 11.5059 12.0703L11.5 11.9795V7C11.5 6.86739 11.5527 6.74025 11.6465 6.64648C11.7403 6.55272 11.8674 6.5 12 6.5Z" fill="#2D2A26" stroke="#2D2A26"/>
                            </svg>
                        </div>
                        <div class="block w-[calc(100%-24px)] ml-2">
                            <span class="font-normal">
                                <?php the_field('hours'); ?>
                            </span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-span-12 xl:col-span-7">
                <div class="block border border-[#CDC7BF] rounded-3xl p-6 lg:p-10 mt-4 xl:mt-0">
                    <h2 class="uppercase text-[29px] xl:text-[54px] font-medium">
                        Book Consultation
                    </h2>
                    <form action="" class="relative">
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 lg:col-span-6">
                                <label for="fname" class="text-[13px] pl-3">First Name</label>
                                <input id="fname" type="text" name="fname" placeholder="Jane" class="w-full border-1 border-[#E5E0D8] rounded-3xl bg-[#E5E0D8] py-2 px-4 hover:border-black duration-200">
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <label for="lname" class="text-[13px] pl-3">Last Name</label>
                                <input id="lname" type="text" name="lname" placeholder="Cooper" class="w-full border-1 border-[#E5E0D8] rounded-3xl bg-[#E5E0D8] py-2 px-4 hover:border-black duration-200">
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <label for="email" class="text-[13px] pl-3">Email</label>
                                <input id="email" type="email" name="email" placeholder="jane.cooper@example.com" class="w-full border-1 border-[#E5E0D8] rounded-3xl bg-[#E5E0D8] py-2 px-4 hover:border-black duration-200">
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <label for="phone" class="text-[13px] pl-3">Phone</label>
                                <input id="phone" type="tel" name="phone" placeholder="(416) 555-0199" class="w-full border-1 border-[#E5E0D8] rounded-3xl bg-[#E5E0D8] py-2 px-4 hover:border-black duration-200">
                            </div>
                            <div class="col-span-12">
                                <label for="cmethod" class="text-[13px] pl-3">Preferred Contact</label>
                                <select name="contact_method" id="cmethod" class="w-full border-1 border-[#E5E0D8] rounded-3xl bg-[#E5E0D8] py-2 px-4 hover:border-black duration-200">
                                    <option disabled readonly selected>Select contact method...</option>
                                    <option value="email">Email</option>
                                    <option value="phone">Phone</option>
                                </select>
                            </div>
                            <div class="col-span-12">
                                <label for="text" class="text-[13px] pl-3">Summary of Tax Matter</label>
                                <textarea name="text" id="text" cols="30" rows="10" class="w-full h-[100px] resize-none border-1 border-[#E5E0D8] rounded-3xl bg-[#E5E0D8] py-2 px-4 hover:border-black duration-200" placeholder="Tell us briefly about your tax matter and how we can help."></textarea>
                            </div>
                            <div class="col-span-12 flex flex-wrap items-center justify-between">
                                <label class="flex items-center w-full lg:w-[calc(100%-205px)]">
                                    <input type="checkbox" name="agreement" class="w-[16px] h-[16px]">
                                    <span class="inline-block cursor-pointer ml-2 text-[13px]">My case involves an urgent CRA deadline or active collection</span>
                                </label>
                                <button title="Send Request" type="button" class="group w-full lg:w-[205px] flex lg:inline-flex items-center justify-center border-2 border-[#2D2A26] rounded-[100px] bg-[#2D2A26] text-[#F7F3EC] text-md font-medium px-8 py-4 duration-200 hover:bg-transparent hover:text-[#2D2A26] mt-3 xl:mt-0">
                                    <span class="inline mr-2">Send Request</span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="stroke-[#F7F3EC] group-hover:stroke-[#2D2A26] duration-200" d="M12 19L19 12L12 5M19 12L5 12" stroke="#F7F3EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();