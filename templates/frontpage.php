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
                <div class="col-span-6 xl:col-span-3 p-6 text-center">
                    <h4 class="text-[29px] font-medium">
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
                <h2 class="col-span-12 text-[48px] leading-[50px] font-medium uppercase w-full max-w-[900px]">
                    <?php the_field('title_01'); ?>
                </h2>
            <?php endif; ?>
            <?php if (get_field('subtitle_01')) : ?>
                <div class="col-span-12 lg:col-span-6 mt-3">
                    <?php the_field('subtitle_01'); ?>
                </div>
            <?php endif; ?>
            <?php if (get_field('all_services_link')) : ?>
                <div class="text-right col-span-12 lg:col-span-6 mt-3">
                    <a href="<?php the_field('all_services_link'); ?>" class="inline underline hover:no-underline" title="View all services">
                        View all services
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="w-full max-w-[1280px] mx-auto px-4 grid grid-cols-12 gap-4 lg:gap-6 py-6 mt-4">
            <?php while (have_rows('cards')) : the_row(); ?>
                <div class="group col-span-12 lg:col-span-6 xl:col-span-4 border border-[#CDC7BF] rounded-2xl p-6 hover:bg-[#2D2A26] hover:border-[#2D2A26] hover:text-[#F7F3EC] duration-200">
                    <?php if (get_sub_field('icon')) : ?>
                        <div class="inline-flex p-3 rounded-md bg-[#E5E0D8] group-hover:bg-[#F7F3EC]">
                            <?php echo get_sub_field('icon'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (get_sub_field('title')) : ?>
                        <h4 class="block mt-3 text-[24px] font-medium">
                            <?php the_sub_field('title'); ?>
                        </h4>
                    <?php endif; ?>
                    <?php if (get_sub_field('text')) : ?>
                        <div class="block mt-3 mb-2 leading-[20px]">
                            <?php the_sub_field('text'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (get_sub_field('link')) : ?>
                        <a href="<?php the_sub_field('text'); ?>" class="underline hover:no-underline font-medium" title="Learn more">
                            Learn more
                        </a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
            <?php if (get_field('button_title_01') && get_field('button_link_01')) : ?>
                <div class="col-span-12 mt-4 text-right">
                    <a href="<?php the_field('button_link_01'); ?>" title="<?php the_field('button_title_01'); ?>" class="group w-full lg:w-auto flex lg:inline-flex items-center justify-center border-2 border-[#2D2A26] rounded-[100px] bg-[#2D2A26] text-[#F7F3EC] text-md font-medium px-8 py-4 duration-200 hover:bg-transparent hover:text-[#2D2A26]">
                        <span class="inline mr-2"><?php the_field('button_title_01'); ?></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="stroke-[#F7F3EC] group-hover:stroke-[#2D2A26] duration-200" d="M12 19L19 12L12 5M19 12L5 12" stroke="#F7F3EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if (get_field('background_01')) : ?>
        <div class="w-full max-w-[1280px] mx-auto mt-[168px] px-4">
            <div class="px-[84px] py-[86px] relative overflow-hidden rounded-2xl text-[#F7F3EC] after:content-[''] after:absolute after:z-1 after:top-0 after:left-0 after:w-full after:h-full after:bg-gradient-to-r after:from-[#2D2A26] after:to-transparent" style="background: url('<?php echo get_field('background_01'); ?>') no-repeat center; background-size: cover;">
                <div class="block relative z-10 w-full max-w-[420px]">
                    <h2 class="text-[48px] leading-[50px] font-medium">
                        <?php the_field('title_02'); ?>
                    </h2>
                    <p class="">
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
                    <div class="col-span-4 text-[24px] font-medium">
                        <?php the_sub_field('title'); ?>
                    </div>
                    <div class="col-span-4">
                        <?php the_sub_field('text'); ?>
                    </div>
                    <div class="col-span-4 text-right">
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
                    <div class="col-span-12 lg:col-span-6 xl:col-span-4">
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
<?php
get_footer();