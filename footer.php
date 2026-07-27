    <div class="border-t border-[#CDC7BF] mt-[84px] pt-[84px]">
        <div class="w-full max-w-[1280px] mx-auto px-4 border-b border-[#CDC7BF] pb-10">
            <div class="grid grid-cols-12 gap-x-6">
                <div class="col-span-12 lg:col-span-6 xl:col-span-4">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
                <div class="col-span-12 lg:col-span-6 xl:col-span-3 mt-6 lg:mt-0">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
                <div class="col-span-12 lg:col-span-6 xl:col-span-3 mt-6 lg:mt-0">
                    <?php dynamic_sidebar('sidebar-3'); ?>
                </div>
            </div>
        </div>
        <div class="w-full max-w-[1280px] mx-auto px-4 py-6 text-[13px] font-light">
            © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
        </div>
    </div>
<?php wp_footer(); ?>
</body>
</html>