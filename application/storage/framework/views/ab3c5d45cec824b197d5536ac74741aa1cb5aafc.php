<div class="bill-taxes-discounts-container col-12 text-right p-t-20 p-b-20">
    <!--adjustment-->
    <button class="btn btn-rounded btn-outline-secondary btn-xs p-l-12 p-r-12 m-l-5 js-elements-popover-button" tabindex="0" id="billing-adjustment-popover-button"
        data-placement="top" data-title="<?php echo e(cleanLang(__('lang.adjustments'))); ?>"
        data-popover-content="<?php echo e($elements['adjustments_popover']); ?>">
        <?php echo e(cleanLang(__('lang.adjustments'))); ?>

    </button>
    <!--tax rates-->
    <button class="btn btn-rounded btn-outline-secondary btn-xs p-l-12 p-r-12 m-l-5 js-elements-popover-button" tabindex="0" id="billing-tax-popover-button"
        data-placement="top" data-popover-content="<?php echo e($elements['tax_popover']); ?>"
        data-title="<?php echo e(cleanLang(__('lang.tax_rates'))); ?>">
        <?php echo e(cleanLang(__('lang.tax_rates'))); ?>

    </button>
    <!--discounts-->
    <button class="btn btn-rounded btn-outline-secondary btn-xs p-l-12 p-r-12 m-l-5 js-elements-popover-button" tabindex="0" id="billing-discounts-popover-button"
        data-placement="top" data-title="<?php echo e(cleanLang(__('lang.discount'))); ?>"
        data-popover-content="<?php echo e($elements['discount_popover']); ?>">
        <?php echo e(cleanLang(__('lang.discounts'))); ?>

    </button>
</div><?php /**PATH /www/wwwroot/fernando.sngcr.com/application/resources/views/pages/bill/components/elements/taxes-discounts.blade.php ENDPATH**/ ?>