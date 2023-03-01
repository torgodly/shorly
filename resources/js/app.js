import './bootstrap';

import Alpine from 'alpinejs';
// Import the plugins
import XHRUpload from '@uppy/xhr-upload'
import Dashboard from '@uppy/dashboard'
import ImageEditor from '@uppy/image-editor'
import Webcam from '@uppy/webcam'
import Uppy from '@uppy/core'
// import css
import '@uppy/core/dist/style.css'
import '@uppy/dashboard/dist/style.css'
import '@uppy/image-editor/dist/style.css'
import '@uppy/webcam/dist/style.css'

// alpine init
window.Alpine = Alpine;

Alpine.start();

//uppy init
const uppy = new Uppy({
    id: 'uppy',
    autoProceed: false,
    allowMultipleUploadBatches: false,
    debug: false,
    restrictions: {
        maxFileSize: 1500000,
        minFileSize: null,
        maxTotalFileSize: null,
        maxNumberOfFiles: 1,
        minNumberOfFiles: 1,
        allowedFileTypes: ['image/*', '.jpg', '.jpeg', '.png', '.gif'],
        requiredMetaFields: [],
    },
    meta: {},
    // onBeforeFileAdded: (currentFile, files) => currentFile,
    // onBeforeUpload: (files) => {},
    // locale: {},
    // store: new DefaultStore(),
    // logger: justErrorsLogger,
    // infoTimeout: 5000,
})
uppy.use(Dashboard, {
    id: 'Dashboard',
    target: 'body',
    hideAfterFinish: true,
    metaFields: [],
    trigger: '#select-avatar',
    inline: false,
    width: 750,
    height: 550,
    thumbnailWidth: 280,
    // defaultTabIcon,
    showLinkToFileUploadResult: true,
    showProgressDetails: true,
    hideUploadButton: false,
    hideRetryButton: false,
    hidePauseResumeButton: false,
    hideCancelButton: false,
    hideProgressAfterFinish: false,
    doneButtonHandler: () => {
        this.uppy.cancelAll()
        this.requestCloseModal()
    },
    note: null,
    closeModalOnClickOutside: true,
    //
    closeAfterFinish: true,
    disableStatusBar: false,
    disableInformer: false,
    disableThumbnailGenerator: false,
    disablePageScrollWhenModalOpen: true,
    animateOpenClose: true,
    fileManagerSelectionType: 'files',
    proudlyDisplayPoweredByUppy: true,
    // onRequestCloseModal: () => this.closeModal(),
    showSelectedFiles: true,
    showRemoveButtonAfterComplete: true,
    showNativePhotoCameraButton: false,
    showNativeVideoCameraButton: false,
    // locale: defaultLocale,
    browserBackButtonClose: true,
    theme: 'light',
    autoOpenFileEditor: true,
    disableLocalFiles: false,
})
uppy.use(ImageEditor, {
    target: Dashboard,
    id: 'ImageEditor',
    quality: 0.8,
    cropperOptions: {
        viewMode: 1,
        background: true,
        autoCropArea: 1,
        responsive: true,
        width: 100,
        height: 100,
        croppedCanvasOptions: {},
    },
    actions: {
        revert: true,
        rotate: true,
        granularRotate: true,
        flip: true,
        zoomIn: true,
        zoomOut: true,
        cropSquare: true,
        cropWidescreen: true,
        cropWidescreenVertical: true,
    },
})
uppy.use(Webcam, {
    onBeforeSnapshot: () => Promise.resolve(),
    countdown: false,
    target: Dashboard,
    modes: [
        'video-audio',
        'video-only',
        'audio-only',
        'picture',
    ],
    mirror: true,
    showVideoSourceDropdown: false,
    /** @deprecated Use `videoConstraints.facingMode` instead. */
    facingMode: 'user',
    videoConstraints: {
        facingMode: 'user',
    },
    preferredImageMimeType: null,
    preferredVideoMimeType: null,
    showRecordingLength: false,
    // mobileNativeCamera: isMobile({ tablet: true }),
    locale: {},
})
uppy.use(XHRUpload, {endpoint: './page'})




