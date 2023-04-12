import "./bootstrap";

import Alpine from "alpinejs";
import swipePlugin from "alpinejs-swipe";
import Clipboard from "@ryangjchandler/alpine-clipboard";
import QRCodeStyling from "qr-code-styling";

import "livewire-sortable";

// Import the plugins
import XHRUpload from "@uppy/xhr-upload";
import Dashboard from "@uppy/dashboard";
import ImageEditor from "@uppy/image-editor";
import Webcam from "@uppy/webcam";
import Uppy from "@uppy/core";
// import css
import "@uppy/core/dist/style.css";
import "@uppy/dashboard/dist/style.css";
import "@uppy/image-editor/dist/style.css";
import "@uppy/webcam/dist/style.css";

// alpine init
Alpine.plugin(Clipboard);
window.Alpine = Alpine;
Alpine.plugin(swipePlugin);

Alpine.start();

// uppy init
const uppy = new Uppy({
    id: "uppy",
    autoProceed: false,
    allowMultipleUploadBatches: false,
    debug: false,
    restrictions: {
        maxFileSize: 1500000,
        minFileSize: null,
        maxTotalFileSize: null,
        maxNumberOfFiles: 1,
        minNumberOfFiles: 1,
        allowedFileTypes: ["image/*", ".jpg", ".jpeg", ".png", ".gif"],
        requiredMetaFields: [],
    },
    meta: {}, // onBeforeFileAdded: (currentFile, files) => currentFile,
    // onBeforeUpload: (files) => {},
    // locale: {},
    // store: new DefaultStore(),
    // logger: justErrorsLogger,
    // infoTimeout: 5000,
});
uppy.use(Dashboard, {
    id: "Dashboard",
    target: "body",
    hideAfterFinish: true,
    metaFields: [],
    trigger: "#select-avatar",
    inline: false,
    width: 1000,
    height: 1000,
    thumbnailWidth: 280, // defaultTabIcon,
    showLinkToFileUploadResult: true,
    showProgressDetails: true,
    hideUploadButton: false,
    hideRetryButton: false,
    hidePauseResumeButton: false,
    hideCancelButton: false,
    hideProgressAfterFinish: false,
    doneButtonHandler: () => {
        this.uppy.cancelAll();
        // this.requestCloseModal();
    },
    note: null,
    closeModalOnClickOutside: true, //
    closeAfterFinish: true,
    disableStatusBar: false,
    disableInformer: false,
    disableThumbnailGenerator: false,
    disablePageScrollWhenModalOpen: true,
    animateOpenClose: true,
    fileManagerSelectionType: "files",
    proudlyDisplayPoweredByUppy: true, // onRequestCloseModal: () => this.closeModal(),
    showSelectedFiles: true,
    showRemoveButtonAfterComplete: true,
    showNativePhotoCameraButton: false,
    showNativeVideoCameraButton: false, // locale: defaultLocale,
    browserBackButtonClose: true,
    theme: "light",
    autoOpenFileEditor: true,
    disableLocalFiles: false,
});
uppy.use(ImageEditor, {
    target: Dashboard,
    id: "ImageEditor",
    quality: 0.8,
    cropperOptions: {
        viewMode: 1,
        background: true,
        autoCropArea: 1,
        responsive: true,
        aspectRatio: 1 / 1,
        // width: 100,
        // height: 100,
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
});
uppy.use(Webcam, {
    onBeforeSnapshot: () => Promise.resolve(),
    countdown: false,
    target: Dashboard,
    modes: ["video-audio", "video-only", "audio-only", "picture"],
    mirror: true,
    showVideoSourceDropdown: false,
    /** @deprecated Use `videoConstraints.facingMode` instead. */
    facingMode: "user",
    videoConstraints: {
        facingMode: "user",
    },
    preferredImageMimeType: null,
    preferredVideoMimeType: null,
    showRecordingLength: false, // mobileNativeCamera: isMobile({ tablet: true }),
    locale: {},
});
uppy.use(XHRUpload, { endpoint: "./page" });
uppy.on("complete", () => {
    location.reload();
});

let UserLink = document.getElementById("UserLink").href;
let Username = document.getElementById("username").innerText;

const qrCodeShow = new QRCodeStyling({
    width: 200,
    height: 200,
    data: UserLink,
    margin: 0,
    qrOptions: {
        typeNumber: "0",
        mode: "Byte",
        errorCorrectionLevel: "M",
    },
    backgroundOptions: {
        color: "transparent",
    },
    imageOptions: { hideBackgroundDots: true, imageSize: 0.8, margin: 0 },
    dotsOptions: { type: "extra-rounded", color: "#f4812a" },
    // backgroundOptions: { color: "#ffffff" },
    image: "https://shor.ly/images/logo/logo.png",
    dotsOptionsHelper: {
        colorType: { single: true, gradient: false },
        gradient: {
            linear: true,
            radial: false,
            color1: "#6a1a4c",
            color2: "#6a1a4c",
            rotation: "0",
        },
    },
    cornersSquareOptions: { type: "extra-rounded", color: "#000000" },
    cornersSquareOptionsHelper: {
        colorType: { single: true, gradient: false },
        gradient: {
            linear: true,
            radial: false,
            color1: "#000000",
            color2: "#000000",
            rotation: "0",
        },
    },
    cornersDotOptions: { type: "", color: "#000000" },
    cornersDotOptionsHelper: {
        colorType: { single: true, gradient: false },
        gradient: {
            linear: true,
            radial: false,
            color1: "#000000",
            color2: "#000000",
            rotation: "0",
        },
    },
    backgroundOptionsHelper: {
        colorType: { single: true, gradient: false },
        gradient: {
            linear: true,
            radial: false,
            color1: "#ffffff",
            color2: "#ffffff",
            rotation: "0",
        },
    },
});
const qrCode = new QRCodeStyling({
    width: 1024,
    height: 1024,
    data: UserLink,
    margin: 0,
    qrOptions: {
        typeNumber: "0",
        mode: "Byte",
        errorCorrectionLevel: "Q",
    },

    imageOptions: { hideBackgroundDots: true, imageSize: 0.8, margin: 0 },
    dotsOptions: { type: "extra-rounded", color: "#f4812a" },
    // backgroundOptions: { color: "#ffffff" },
    image: "https://shor.ly/images/logo/logo.png",

    dotsOptionsHelper: {
        colorType: { single: true, gradient: false },
        gradient: {
            linear: true,
            radial: false,
            color1: "#6a1a4c",
            color2: "#6a1a4c",
            rotation: "0",
        },
    },
    cornersSquareOptions: { type: "extra-rounded", color: "#000000" },
    cornersSquareOptionsHelper: {
        colorType: { single: true, gradient: false },
        gradient: {
            linear: true,
            radial: false,
            color1: "#000000",
            color2: "#000000",
            rotation: "0",
        },
    },
    cornersDotOptions: { type: "", color: "#000000" },
    cornersDotOptionsHelper: {
        colorType: { single: true, gradient: false },
        gradient: {
            linear: true,
            radial: false,
            color1: "#000000",
            color2: "#000000",
            rotation: "0",
        },
    },
    backgroundOptionsHelper: {
        colorType: { single: true, gradient: false },
        gradient: {
            linear: true,
            radial: false,
            color1: "#ffffff",
            color2: "#ffffff",
            rotation: "0",
        },
    },
});

qrCodeShow.append(document.getElementById("canvas"));

document.getElementById("SVG").addEventListener("click", SVG);
document.getElementById("PNG").addEventListener("click", PNG);

function SVG() {
    qrCode.download({ name: "shorly-" + Username, extension: "svg" });
}

function PNG() {
    qrCode.download({
        name: "shorly-" + Username,
        extension: "png",
    });
}
