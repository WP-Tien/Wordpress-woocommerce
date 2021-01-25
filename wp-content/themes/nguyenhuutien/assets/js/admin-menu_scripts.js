/**
 * * Author: TienNguyen
 * * Version: 1.0.0
 * 
 * * Incoming data_icons : to get all icons via yml file fontawesome.
 */

(function ($) {
    'use strict';

    var $document = $(document.body);
    var icons = data_icons;

    var menu = $('#menu-to-edit');
    const iconsDOM = $('.admin-icon-selector');

    class AdminMenu {
        constructor() {
            this.update();
            this.adminOnChange();
            this.adminSortStop();
        }

        // Use as Mega Menu Checkbox
        update() {
            menu.children().removeClass('mega-menu');

            menu.children('.menu-item-depth-0:has(.mega-menu__checkbox:checked)').each(function () {
                var item = $(this);

                item.addClass('mega-menu');
                item.nextUntil('.menu-item-depth-0').addClass('mega-menu');
            });
        }

        // Reflect admin on change
        adminOnChange() {
            $document.on('change', '.menu-item-depth-0 .mega-menu__checkbox', () => {
                this.update();
            });
        }

        // FIXME our handler should be called after WP handler
        adminSortStop() {
            menu.on('sortstop', () => {
                setTimeout(() => {
                    this.update();
                }, 1);
            });
        }
    }

    class Icons {
        getIcons() {
            icons = Object.keys(icons).map((k) => {
                const name = k;
                const label = icons[k].label;
                const styles = icons[k].styles;
                const unicode = icons[k].unicode;

                return { name, label, styles, unicode };
            });

            return icons;
        }

        // Some rules of free-font awesome version.
        static styleClass(style) {
            switch (style) {
                case "solid":
                    style = "fas";
                    break;
                case "brands":
                    style = "fab";
                    break;
                case "regular":
                    style = "far";
                    break;
                default:
                    style = "";
            }
            return style;
        }
    }

    class UI {
        constructor() {
            this.showIconsModal();
            this.closeIconsModal();
            this.selectIcon();
            this.saveIcon();
            this.deleteIcon();
        }

        // Resize icon List to fit entire window
        resizeIconList() {
            var frame_content = $('.media-frame-content');
            var icon_list = $('.admin-icon-selector');

            icon_list.css('max-height', 'none').height(1000000);
            frame_content.scrollTop(1000000);
            icon_list.height(icon_list.height() - frame_content.scrollTop());
        }

        // Add/ Edit Icon Buttons
        showIconsModal() {
            $document.on('click', '[data-action=mega-menu-pick-icon]', function (event) {
                event.preventDefault();

                $('.wp-admin').addClass('modal-open');
                const dataItem = $(event.target).closest('.field-menu-item-icon').data('item');

                $('.admin-menu-icons-modal').show().css('visibility', 'visible').attr('data-item', dataItem);
            });
        }

        closeIconsModal() {
            $document.on('click', '.media-modal-close, .media-modal-backdrop', () => {
                $('.wp-admin').removeClass('modal-open');
                $('.admin-menu-icons-modal').fadeOut();
            });
        }

        displayIcons(icons) {
            let result = "";

            $.each(icons, (k, v) => {
                $.each(v.styles, (kStyle, vStyle) => {
                    let iconClass = Icons.styleClass(vStyle);
                    result += `
                        <div class="icon icon__${v.name}" data-icon="${iconClass} fa-${v.name}" >
                        <i class="${iconClass} fa-${v.name}"></i>
                        </div>
                    `;
                });
            });

            setTimeout(() => {
                iconsDOM.html(result);
            }, 1000);
        }

        // Immediately close dialog after clicking on icon 
        selectIcon() {
            $document.on('click', '.icon', function (event) {
                event.preventDefault();

                const valueIcon = $('.admin-menu-icons-modal').attr('data-item');
                const valueClass = $(this).data('icon');

                console.log(valueClass);

                $('#edit-menu-item-icon-' + valueIcon).val(valueClass);
                const htmlIcon = `<i class="${valueClass}"></i>`;
                $('#edit-menu-item-icon-' + valueIcon).closest('.field-menu-item-icon').removeClass('empty').find('.mega-menu-icon-selected').html(htmlIcon);;

                // Close modal
                $('.admin-menu-icons-modal').hide();
                $('.wp-admin').removeClass('modal-open');
            });
        }

        saveIcon() {
            $document.on('click', '#admin-save-icon', function () {
                const valueIcon = $('.admin-menu-icons-modal').attr('data-item');
                const valueClass = $('.admin-menu-icons-modal').attr('data-class');

                $('#edit-menu-item-icon-' + valueIcon).val(valueClass);

                const cleanClass = valueClass.replace(',', ' ');

                // const htmlIcon = `<i class="${cleanClass}"></i>`;
                // $('#edit-menu-item-icon-'+valueIcon).prev().find('.icon-admin-button').show().html(htmlIcon);

                $('.admin-menu-icons-modal').hide();
            });
        }

        deleteIcon() {
            $document.on('click', '[data-action=mega-menu-remove-icon]', function (event) {
                event.preventDefault();
                event.stopPropagation();

                $(this).closest('.field-menu-item-icon').find('input').val('').trigger('change');
                $(this).closest('.field-menu-item-icon').addClass('empty');
            })
        }
    }

    $(document).ready(function () {
        new AdminMenu();
        const ui = new UI();

        //  Resize media modal
        if ($('.media-modal').height() < 500) {
            ui.resizeIconList();
        }
        $(window).resize(function () {
            ui.resizeIconList();
        });
        // #End resize media modal

        const iconsObj = new Icons();
        const dataIcons = iconsObj.getIcons();

        ui.displayIcons(dataIcons);
    });

})(jQuery);
