<template>
    <div class="modal fade" id="modal-block-small" tabindex="-1" aria-labelledby="modal-block-small"
         style="display: none;" aria-hidden="true"
         v-show="open" role="dialog"
         :class="{'d-block show': open}"
    >
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ title }}</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                    v-on:click="$emit('cancel')" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <p> {{ description }}</p>
                    </div>
                    <div class="block-content block-content-full text-end bg-body d-flex justify-content-end">
                        <button v-if="cancelLabel" type="button" class="btn btn-sm btn-alt-secondary me-1"
                                v-on:click="$emit('cancel')"
                                data-dismiss="modal">{{ cancelLabel }}
                        </button>
                        <span v-if="confirmLabel">
                       <button
                           v-if="(isLoading || isConfirmButtonDisabled)"
                           disabled
                           class="btn btn-sm btn-primary"
                           :class="{'opacity-50 cursor-not-allowed pointer-events-none': (isLoading || isConfirmButtonDisabled)}">
                           {{ confirmLabel }}
                       </button>
                        <button v-else v-on:click="$emit('confirm')" type="button"
                                :class="{
                        'bg-primary':icon=='',
                        'bg-success': icon=='success' || icon=='user',
                        'bg-danger': icon=='warning',
                        'bg-warning': icon=='copy',
                        'bg-gray-700': isLoading || isConfirmButtonDisabled,
                        'cursor-wait':isLoading
                        }"
                                class="btn btn-sm btn-primary">
                    {{ confirmLabel }}
                       </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AppModal",
    props: {
        open: {
            type: Boolean,
            default: false
        },
        config: Object,
        title: String,
        description: String,
        confirmLabel: String,
        cancelLabel: String,
        icon: String,
        isLoading: {
            type: Boolean,
            default: false
        },
        isConfirmButtonDisabled: {
            type: Boolean,
            default: false
        },
        emits: ['confirm', 'cancel'],
        setup() {
            return {}
        }
    },
}
</script>

<style scoped>
    div.modal.show {
        background-color: rgba(0, 0, 0, 0.51);
    }
</style>
