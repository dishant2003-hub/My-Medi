"use strict";
$(function () {
    var e = $(".select2");
    e.length && e.each(function () {
        var e = $(this);
        e.wrap('<div class="position-relative"></div>'), e.select2({
            placeholder: "Select an country",
            dropdownParent: e.parent()
        })
    })
}), document.addEventListener("DOMContentLoaded", function (e) {
    {
        const m = document.querySelector("#multiStepsValidation");
        if (m, null !== m) {
            const u = m.querySelector("#multiStepsForm"),
                c = u.querySelector("#accountDetailsValidation");
            var n = u.querySelector("#personalInfoValidation");
                // a = u.querySelector("#billingLinksValidation");
            const d = [].slice.call(u.querySelectorAll(".btn-next")),
                p = [].slice.call(u.querySelectorAll(".btn-prev"));
            var s = document.querySelector(".multi-steps-exp-date"),
                i = document.querySelector(".multi-steps-cvv"),
                o = document.querySelector(".multi-steps-mobile"),
                r = document.querySelector(".multi-steps-pincode"),
                l = document.querySelector(".multi-steps-card");
            s && new Cleave(s, {
                date: !0,
                delimiter: "/",
                datePattern: ["m", "y"]
            }), i && new Cleave(i, {
                numeral: !0,
                numeralPositiveOnly: !0
            }), o && new Cleave(o, {
                // phone: !0,
                // phoneRegionCode: "US"
            }), r && new Cleave(r, {
                delimiter: "",
                numeral: !0
            }), l && new Cleave(l, {
                creditCard: !0,
                onCreditCardTypeChanged: function (e) {
                    document.querySelector(".card-type").innerHTML = "" != e && "unknown" != e ? '<img src="' + assetsPath + "img/icons/payments/" + e + '-cc.png" height="28"/>' : ""
                }
            });
            let t = new Stepper(m, {
                linear: !0
            });
            const g = FormValidation.formValidation(c, {
                    fields: {
                        user_fullname: {
                            validators: {
                                notEmpty: {
                                    message: "Please enter username"
                                },
                                stringLength: {
                                    min: 3,
                                    max: 50,
                                    message: "The name must be more than 3 and less than 50 characters long"
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z0-9 ]+$/,
                                    message: "The name can only consist of alphabetical, number and space"
                                }
                            }
                        },
                        user_email: {
                            validators: {
                                notEmpty: {
                                    message: "Please enter email address"
                                },
                                emailAddress: {
                                    message: "The value is not a valid email address"
                                }
                            }
                        },
                        user_password: {
                            validators: {
                                notEmpty: {
                                    message: "Please enter password"
                                }
                            }
                        },
                        multiStepsConfirmPass: {
                            validators: {
                                notEmpty: {
                                    message: "Confirm Password is required"
                                },
                                identical: {
                                    compare: function () {
                                        return c.querySelector('[name="user_password"]').value
                                    },
                                    message: "The password and its confirm are not the same"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap5: new FormValidation.plugins.Bootstrap5({
                            eleValidClass: "",
                            rowSelector: ".col-sm-6"
                        }),
                        autoFocus: new FormValidation.plugins.AutoFocus,
                        submitButton: new FormValidation.plugins.SubmitButton
                    },
                    init: e => {
                        e.on("plugins.message.placed", function (e) {
                            e.element.parentElement.classList.contains("input-group") && e.element.parentElement.insertAdjacentElement("afterend", e.messageElement)
                        })
                    }
                }).on("core.form.valid", function () {
                    t.next()
                }),
                S = FormValidation.formValidation(n, {
                    fields: {
                        picture: {
                            validators: {
                                notEmpty: {
                                    message: "Please select picture"
                                }
                            }
                        },
                        user_address: {
                            validators: {
                                notEmpty: {
                                    message: "Please enter your address"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap5: new FormValidation.plugins.Bootstrap5({
                            eleValidClass: "",
                            rowSelector: function (e, t) {
                                switch (e) {
                                    case "multiStepsFirstName":
                                        return ".col-sm-6";
                                    case "user_address":
                                        return ".col-md-12";
                                    default:
                                        return ".row"
                                }
                            }
                        }),
                        autoFocus: new FormValidation.plugins.AutoFocus,
                        submitButton: new FormValidation.plugins.SubmitButton
                    }
                }).on("core.form.valid", function () {
                    // t.next()
                    // alert("Submitted..!!")
                });
                /*v = FormValidation.formValidation(a, {
                    fields: {
                        multiStepsCard: {
                            validators: {
                                notEmpty: {
                                    message: "Please enter card number"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap5: new FormValidation.plugins.Bootstrap5({
                            eleValidClass: "",
                            rowSelector: function (e, t) {
                                return "multiStepsCard" !== e ? ".col-dm-6" : ".col-md-12"
                            }
                        }),
                        autoFocus: new FormValidation.plugins.AutoFocus,
                        submitButton: new FormValidation.plugins.SubmitButton
                    },
                    init: e => {
                        e.on("plugins.message.placed", function (e) {
                            e.element.parentElement.classList.contains("input-group") && e.element.parentElement.insertAdjacentElement("afterend", e.messageElement)
                        })
                    }
                }).on("core.form.valid", function () {
                    alert("Submitted..!!")
                });*/
            d.forEach(e => {
                e.addEventListener("click", e => {
                    switch (t._currentIndex) {
                        case 0:
                            g.validate();
                            break;
                        case 1:
                            S.validate();
                        //     break;
                        // case 2:
                        //     v.validate()
                    }
                })
            }), p.forEach(e => {
                e.addEventListener("click", e => {
                    switch (t._currentIndex) {
                        case 1:
                        case 0:
                            t.previous()
                    }
                })
            })
        }
        return
    }
});