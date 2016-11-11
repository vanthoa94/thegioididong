function lockSubmit(obj, options) {
    var locksubmit = null;
    var listLockControl = null;
    var self = this;
    this.init = function () {
        locksubmit = obj.find(".locksubmit");
        listLockControl = obj.find('.lockcontrol');
        listLockControl.each(function () {
            if (this.type == "file") {
                $(this).change(function () {
                    if (locksubmit.hasClass('disabled')) {
                        locksubmit.removeClass('disabled').removeAttr('disabled');
                    }
                });
                $(this).parent().find(".removefile").click(function () {
                    self.disabled(false);
                });
            } else {
                var timelock = null;
                $(this).attr('data-old', $(this).val()).keydown(function () {
                    clearTimeout(timelock);
                    var th = $(this);
                    timelock = setTimeout(function () {
                        if ($.trim(th.val()) != th.attr('data-old')) {
                            if (locksubmit.hasClass('disabled')) {
                                locksubmit.removeClass('disabled').removeAttr('disabled');
                            }
                        } else {
                            self.disabled(true);
                        }
                    }, 1000);
                }).change(function () {
                    clearTimeout(timelock);

                    var th = $(this);
                    if ($.trim(th.val()) != th.attr('data-old')) {
                        if (locksubmit.hasClass('disabled')) {
                            locksubmit.removeClass('disabled').removeAttr('disabled');
                        }
                    } else {
                        self.disabled(true);
                    }
                });
            }
            
            
        });
    };
    this.disabled = function (b) {
        if (!locksubmit.hasClass('disabled')) {
            var flag = false;
            listLockControl.each(function () {
                if (this.type != "file") {
                    if ($.trim($(this).val()) != $(this).attr('data-old')) {
                        flag = true;
                    }
                } else {
                    if (b) {
                        var image = $(this).parent().find("img:eq(0)");
                        if (image.attr("data-img") != image.attr("src")) {
                            flag = true;
                        }
                    }
                }
            });
            if (!flag) {
                locksubmit.addClass('disabled').attr('disabled', 'disabled');
            }
        }
    }
}