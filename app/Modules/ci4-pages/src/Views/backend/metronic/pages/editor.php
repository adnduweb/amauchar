<?php use \Adnduweb\Ci4Admin\Libraries\Theme; ?>
<?= $this->extend('Themes\backend\metronic\admin') ?>
<?= $this->section('main') ?>

<div class="d-flex">
<div id="navbar" class="sidenav d-flex flex-column overflow-scroll">
      
      <div class="">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button
              class="nav-link active"
              id="home-tab"
              data-bs-toggle="tab"
              data-bs-target="#block"
              type="button"
              role="tab"
              aria-controls="block"
              aria-selected="true"
            >
              <i class="bi bi-grid-fill"></i>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="trait-tab"
              data-bs-toggle="tab"
              data-bs-target="#trait"
              type="button"
              role="tab"
              aria-controls="trait"
              aria-selected="false"
            >
              <i class="bi bi-layers-fill"></i>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="style-tab"
              data-bs-toggle="tab"
              data-bs-target="#style"
              type="button"
              role="tab"
              aria-controls="style"
              aria-selected="false"
            >
              <i class="bi bi-palette-fill"></i>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="traits-tab"
              data-bs-toggle="tab"
              data-bs-target="#traits"
              type="button"
              role="tab"
              aria-controls="traits"
              aria-selected="false"
            >
              <i class="bi bi-puzzle"></i>
            </button>
          </li>
        </ul>
        <div class="tab-content">
          <div
            class="tab-pane fade show active"
            id="block"
            role="tabpanel"
            aria-labelledby="block-tab"
          >
            <div id="blocks"></div>
          </div>
          <div
            class="tab-pane fade"
            id="trait"
            role="tabpanel"
            aria-labelledby="trait-tab"
          >
            <div id="layers-container"></div>
          </div>
          <div
            class="tab-pane fade"
            id="style"
            role="tabpanel"
            aria-labelledby="style-tab"
          >
            <div id="styles-container">
                <div id="selectorManager"></div>
            </div>
          </div>

          <div
            class="tab-pane fade"
            id="traits"
            role="tabpanel"
            aria-labelledby="traits-tab"
          >
            <div id="traitsManager"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="main-content">
      <nav class="navbar navbar-light">
        <div class="container-fluid">
          <div class="panel__devices"></div>
          <div class="panel__basic-actions"></div>
        </div>
      </nav>
      <div id="editor"></div>
    </div>
</div>

    <?= $this->endSection() ?>

<?= $this->section('AdminAfterExtraJs') ?>

<script type="text/javascript">

"use strict";
// Class definition

var KTBuilderPage = function () {    
    // Private functions
    var demos = function () {

        const editor = grapesjs.init({
            container: "#editor",
            storageManager: false,
            i18n: {
                locale: 'fr', // default locale
                detectLocale: true, // by default, the editor will detect the language
                localeFallback: 'fr', // default fallback
                messages: { fr },
            },
            blockManager: {
                appendTo: "#blocks",
            },
            selectorManager: {
                appendTo: "#selectorManager",
                componentFirst: true,
            },
            traitManager: {
                appendTo: '#traitsManager',
            },
            styleManager: {
                clearProperties: true,
                appendTo: "#styles-container",
                sectors: [{
                    name: 'General',
                    buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom'],
                    properties:[{
                        name: 'Alignment',
                        property: 'float',
                        type: 'radio',
                        defaults: 'none',
                        list: [
                            { value: 'none', className: 'fa fa-times'},
                            { value: 'left', className: 'fa fa-align-left'},
                            { value: 'right', className: 'fa fa-align-right'}
                        ],
                        },
                        { property: 'position', type: 'select'}
                    ],
                    },
                    {
                        name: 'Dimension',
                        open: false,
                        buildProps: ['width', 'flex-width', 'height', 'max-width', 'min-height', 'margin', 'padding'],
                        properties: [{
                        id: 'flex-width',
                        type: 'integer',
                        name: 'Width',
                        units: ['px', '%'],
                        property: 'flex-basis',
                        toRequire: 1,
                        },{
                        property: 'margin',
                        properties:[
                            { name: 'Top', property: 'margin-top'},
                            { name: 'Right', property: 'margin-right'},
                            { name: 'Bottom', property: 'margin-bottom'},
                            { name: 'Left', property: 'margin-left'}
                        ],
                        },{
                        property  : 'padding',
                        properties:[
                            { name: 'Top', property: 'padding-top'},
                            { name: 'Right', property: 'padding-right'},
                            { name: 'Bottom', property: 'padding-bottom'},
                            { name: 'Left', property: 'padding-left'}
                        ],
                        }],
                    }
                    ,{
                        name: 'Typography',
                        open: false,
                        buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-align', 'text-decoration', 'text-shadow'],
                        properties:[
                        { name: 'Font', property: 'font-family'},
                        { name: 'Weight', property: 'font-weight'},
                        { name:  'Font color', property: 'color'},
                        {
                            property: 'text-align',
                            type: 'radio',
                            defaults: 'left',
                            list: [
                            { value : 'left',  name : 'Left',    className: 'fa fa-align-left'},
                            { value : 'center',  name : 'Center',  className: 'fa fa-align-center' },
                            { value : 'right',   name : 'Right',   className: 'fa fa-align-right'},
                            { value : 'justify', name : 'Justify',   className: 'fa fa-align-justify'}
                            ],
                        },{
                            property: 'text-decoration',
                            type: 'radio',
                            defaults: 'none',
                            list: [
                            { value: 'none', name: 'None', className: 'fa fa-times'},
                            { value: 'underline', name: 'underline', className: 'fa fa-underline' },
                            { value: 'line-through', name: 'Line-through', className: 'fa fa-strikethrough'}
                            ],
                        },{
                            property: 'text-shadow',
                            properties: [
                            { name: 'X position', property: 'text-shadow-h'},
                            { name: 'Y position', property: 'text-shadow-v'},
                            { name: 'Blur', property: 'text-shadow-blur'},
                            { name: 'Color', property: 'text-shadow-color'}
                            ],
                        }],
                    },{
                        name: 'Decorations',
                        open: false,
                        buildProps: ['opacity', 'background-color', 'border-radius', 'border', 'box-shadow', 'background'],
                        properties: [{
                        type: 'slider',
                        property: 'opacity',
                        defaults: 1,
                        step: 0.01,
                        max: 1,
                        min:0,
                        },{
                            property: 'border-radius',
                            properties  : [
                                { name: 'Top', property: 'border-top-left-radius'},
                                { name: 'Right', property: 'border-top-right-radius'},
                                { name: 'Bottom', property: 'border-bottom-left-radius'},
                                { name: 'Left', property: 'border-bottom-right-radius'}
                            ],
                        },{
                            property: 'box-shadow',
                            properties: [
                                { name: 'X position', property: 'box-shadow-h'},
                                { name: 'Y position', property: 'box-shadow-v'},
                                { name: 'Blur', property: 'box-shadow-blur'},
                                { name: 'Spread', property: 'box-shadow-spread'},
                                { name: 'Color', property: 'box-shadow-color'},
                                { name: 'Shadow type', property: 'box-shadow-type'}
                            ],
                        },{
                            property: 'background',
                            properties: [
                                { name: 'Image', property: 'background-image'},
                                { name: 'Repeat', property:   'background-repeat'},
                                { name: 'Position', property: 'background-position'},
                                { name: 'Attachment', property: 'background-attachment'},
                                { name: 'Size', property: 'background-size'}
                            ],
                        },],
                    },{
                        name: 'Extra',
                        open: false,
                        buildProps: ['transition', 'perspective', 'transform'],
                        properties: [{
                        property: 'transition',
                        properties:[
                            { name: 'Property', property: 'transition-property'},
                            { name: 'Duration', property: 'transition-duration'},
                            { name: 'Easing', property: 'transition-timing-function'}
                        ],
                        },{
                        property: 'transform',
                        properties:[
                            { name: 'Rotate X', property: 'transform-rotate-x'},
                            { name: 'Rotate Y', property: 'transform-rotate-y'},
                            { name: 'Rotate Z', property: 'transform-rotate-z'},
                            { name: 'Scale X', property: 'transform-scale-x'},
                            { name: 'Scale Y', property: 'transform-scale-y'},
                            { name: 'Scale Z', property: 'transform-scale-z'}
                        ],
                        }]
                    },{
                        name: 'Flex',
                        open: false,
                        properties: [{
                        name: 'Flex Container',
                        property: 'display',
                        type: 'select',
                        defaults: 'block',
                        list: [
                            { value: 'block', name: 'Disable'},
                            { value: 'flex', name: 'Enable'}
                        ],
                        },{
                        name: 'Flex Parent',
                        property: 'label-parent-flex',
                        type: 'integer',
                        },{
                        name      : 'Direction',
                        property  : 'flex-direction',
                        type    : 'radio',
                        defaults  : 'row',
                        list    : [{
                                    value   : 'row',
                                    name    : 'Row',
                                    className : 'icons-flex icon-dir-row',
                                    title   : 'Row',
                                },{
                                    value   : 'row-reverse',
                                    name    : 'Row reverse',
                                    className : 'icons-flex icon-dir-row-rev',
                                    title   : 'Row reverse',
                                },{
                                    value   : 'column',
                                    name    : 'Column',
                                    title   : 'Column',
                                    className : 'icons-flex icon-dir-col',
                                },{
                                    value   : 'column-reverse',
                                    name    : 'Column reverse',
                                    title   : 'Column reverse',
                                    className : 'icons-flex icon-dir-col-rev',
                                }],
                        },{
                        name      : 'Justify',
                        property  : 'justify-content',
                        type    : 'radio',
                        defaults  : 'flex-start',
                        list    : [{
                                    value   : 'flex-start',
                                    className : 'icons-flex icon-just-start',
                                    title   : 'Start',
                                },{
                                    value   : 'flex-end',
                                    title    : 'End',
                                    className : 'icons-flex icon-just-end',
                                },{
                                    value   : 'space-between',
                                    title    : 'Space between',
                                    className : 'icons-flex icon-just-sp-bet',
                                },{
                                    value   : 'space-around',
                                    title    : 'Space around',
                                    className : 'icons-flex icon-just-sp-ar',
                                },{
                                    value   : 'center',
                                    title    : 'Center',
                                    className : 'icons-flex icon-just-sp-cent',
                                }],
                        },{
                        name      : 'Align',
                        property  : 'align-items',
                        type    : 'radio',
                        defaults  : 'center',
                        list    : [{
                                    value   : 'flex-start',
                                    title    : 'Start',
                                    className : 'icons-flex icon-al-start',
                                },{
                                    value   : 'flex-end',
                                    title    : 'End',
                                    className : 'icons-flex icon-al-end',
                                },{
                                    value   : 'stretch',
                                    title    : 'Stretch',
                                    className : 'icons-flex icon-al-str',
                                },{
                                    value   : 'center',
                                    title    : 'Center',
                                    className : 'icons-flex icon-al-center',
                                }],
                        },{
                        name: 'Flex Children',
                        property: 'label-parent-flex',
                        type: 'integer',
                        },{
                        name:     'Order',
                        property:   'order',
                        type:     'integer',
                        defaults :  0,
                        min: 0
                        },{
                        name    : 'Flex',
                        property  : 'flex',
                        type    : 'composite',
                        properties  : [{
                                name:     'Grow',
                                property:   'flex-grow',
                                type:     'integer',
                                defaults :  0,
                                min: 0
                                },{
                                name:     'Shrink',
                                property:   'flex-shrink',
                                type:     'integer',
                                defaults :  0,
                                min: 0
                                },{
                                name:     'Basis',
                                property:   'flex-basis',
                                type:     'integer',
                                units:    ['px','%',''],
                                unit: '',
                                defaults :  'auto',
                                }],
                        },{
                        name      : 'Align',
                        property  : 'align-self',
                        type      : 'radio',
                        defaults  : 'auto',
                        list    : [{
                                    value   : 'auto',
                                    name    : 'Auto',
                                },{
                                    value   : 'flex-start',
                                    title    : 'Start',
                                    className : 'icons-flex icon-al-start',
                                },{
                                    value   : 'flex-end',
                                    title    : 'End',
                                    className : 'icons-flex icon-al-end',
                                },{
                                    value   : 'stretch',
                                    title    : 'Stretch',
                                    className : 'icons-flex icon-al-str',
                                },{
                                    value   : 'center',
                                    title    : 'Center',
                                    className : 'icons-flex icon-al-center',
                                }],
                        }]
                    }
                ]
            },
            layerManager: {
                appendTo: "#layers-container",
            },
            panels: {
                defaults: [
                {
                    id: "basic-actions",
                    el: ".panel__basic-actions",
                    buttons: [
                        {
                            id: "visibility",
                            active: true, // active by default
                            className: "btn-toggle-borders",
                            label: '<i class="bi bi-border"></i>',
                            command: "sw-visibility", // Built-in command
                        },
                         {
                            id: 'export',
                            className: 'btn-open-export',
                            label: 'Exp',
                            command: 'export-template',
                            context: 'export-template', // For grouping context of buttons from the same panel
                        }, {
                            id: 'show-json',
                            className: 'btn-show-json',
                            label: 'JSON',
                            context: 'show-json',
                            command(editor) {
                                editor.Modal.setTitle('Components JSON')
                                .setContent(`<textarea style="width:100%; height: 250px;">
                                    ${JSON.stringify(editor.getComponents())}
                                </textarea>`)
                                .open();
                            },
                        },
                        {
                            id: 'clear-cache',
                            className: 'fa fa-trash',
                            command: e => e.runCommand('clear-cache'),
                        }
                    ],
                },
                {
                    id: "panel-devices",
                    el: ".panel__devices",
                    buttons: [
                    {
                        id: "device-desktop",
                        label: '<i class="bi bi-laptop"></i>',
                        command: function(e) { return e.setDevice("Desktop") },
                        active: true,
                        togglable: false,
                    },
                    {
                        id: "device-tablet",
                        label: '<i class="bi bi-tablet"></i>',
                        command: function(e) { return e.setDevice("Tablet") },
                        active: true,
                        togglable: false,
                    },
                    {
                        id: "device-mobile",
                        label: '<i class="bi bi-phone"></i>',
                        command: function(e) { return e.setDevice("Mobile portrait") },
                        togglable: false,
                    },
                    ],
                },
                ],
            },
            canvas: {
              styles: [
                "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css",
            ],
              scripts: [
                "https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js",
                "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js",
              ],
            },
            storageManager: {
                type: 'remote',
                stepsBeforeSave: 1,
                autosave: true,         // Store data automatically
                autoload: true,
                urlStore: '<?= route_to('page-builder-store', $form->getID()); ?>',
                urlLoad: '<?= route_to('page-builder-load', $form->getID()); ?>',
                params: { [crsftoken]: $('meta[name="X-CSRF-TOKEN"]').attr('content') },
                contentTypeJson: true,
                storeComponents: true,
                storeStyles: true,
                storeHtml: true,
                storeCss: true,
                headers: {
                    'Content-Type': 'application/json',
                },
                json_encode:{
                    "gjs-html": [],
                    "gjs-css": []
                }
            },
             assetManager: {
                storageType : '',
                storeOnChange : true,
                storeAfterUpload : true,
                 // Upload endpoint, set `false` to disable upload, default `false`
                upload: Medias.urlUpload,
                params: { [crsftoken]: $('meta[name="X-CSRF-TOKEN"]').attr('content') },
                // The name used in POST to pass uploaded files, default: `'files'`
                uploadName: 'files',
                assets: [
                    <?php foreach($medias as $media){ ?>
                    <?php foreach($media->getAllDimensions()->dimensions as $dimension){  ?>
                    {
                        type: 'image',
                        dimension: '<?= $dimension['dimension']; ?>',
                        src: '<?= $dimension['url']; ?>',
                        height: <?= $dimension['height']; ?>,
                        width: <?= $dimension['width']; ?>
                    },
                    <?php } ?>
                    <?php } ?>
                   
                ],

            },  
            plugins: ["grapesjs-custom-code"],
            pluginsOpts: {
                'grapesjs-custom-code': {},
                blocksBasicOpts: { flexGrid: 1 },
            },
        });

         // The upload is started
         editor.on('asset:upload:start', () => {
            startAnimation();
            console.log('start');
        });

        // The upload is ended (completed or not)
        editor.on('asset:upload:end', () => {
            endAnimation();
            console.log('end');
        });

        // Error handling
        editor.on('asset:upload:error', (err) => {
            toastr.error(response.messages.error);
        });

        // Do something on response
        editor.on('asset:upload:response', (response) => {
        console.log('response');
        });

        editor.Commands.add('clear-cache', () => editor.DomComponents.clear() );

        editor.BlockManager.add("section-block",{
            label: 'Section',
            media: ` <?= service('theme')->getSVG('icons/duotone/Layout/Layout-polygon.svg', "svg-icon svg-icon svg-icon-3x"); ?>`,
            content: `<section></section>
            <style>
            section {
                padding: 10px;
                min-height: 75px;
            }
            </style>`,
            editable: true,
            draggable: true,
            stylable: true,
            selectable: true,
            category: 'Basic',
            attributes: {
                title: 'Insert h1 block'
            }
        });

        editor.BlockManager.add("container-block",{
            label: `<div>
              <div class="my-label-block">Container</div>
            </div>`,   
            media: ` <?= service('theme')->getSVG('icons/duotone/Layout/Layout-top-panel-6.svg', "svg-icon svg-icon svg-icon-3x"); ?>`,
            content: `<div class="container"></div>
            <style>
            .container {
                padding-right: 15px;
                padding-left: 15px;
                max-width:1080px; 
                margin: 0 auto;
                min-height: 75px;
            }
            </style>`,
            editable: true,
            draggable: true,
            stylable: true,
            selectable: true,
            category: 'Basic',
            attributes: {
                title: 'Insert h1 block',
                class: "fa",
                id: '0001'
            }
        });

        editor.BlockManager.add('the-row-block', {
            label: '2 Columns',
            media: ` <?= service('theme')->getSVG('icons/duotone/Layout/Layout-vertical.svg', "svg-icon svg-icon svg-icon-3x"); ?>`,
            content: `
                <div class="row" data-gjs-droppable=".row-cell" data-gjs-custom-name="Row">
                    <div class="col-md-6 col-xl-6" data-gjs-draggable=".row"></div>
                    <div class="col-md-6 col-xl-6" data-gjs-draggable=".row"></div>
                </div>
                <style>
                    .row {
                        display: flex;
                        flex-wrap: wrap;
                        margin-right: -15px;
                        margin-left: -15px;
                        padding: 10px;
                        min-height: 75px;
                    }
                    .col-xl-6 {
                        flex: 0 0 50%;
                        max-width: 50%;
                        min-height: 75px;
                    }
                   
                </style>`,
            editable: true,
            draggable: true,
            stylable: true,
            selectable: true,
            category: 'Basic',
        });

        editor.BlockManager.add("image11",{
            id: 'image',
            label: 'Image',
            media: `<?= service('theme')->getSVG('icons/duotone/Home/Picture.svg', "svg-icon svg-icon svg-icon-3x"); ?>`,
            // Use `image` component
            content: [{ type: 'image'}], 
            // The component `image` is activatable (shows the Asset Manager).
            // We want to activate it once dropped in the canvas.
            activate: true,
            editable: true,
            draggable: true,
            stylable: true,
            selectable: true,
            category: 'Basic',
            // select: true, // Default with `activate: true`
          });

         
        editor.BlockManager.add('h1-block', {
            label: 'Heading',
            content: '<h1>Titre H1</h1>',
            media: ` <?= service('theme')->getSVG('icons/duotone/Text/H1.svg', "svg-icon svg-icon svg-icon-3x"); ?>`,
            editable: true,
            draggable: true,
            stylable: true,
            selectable: true,
            category: 'Basic',
            attributes: {
                title: 'Insert h1 block', 
                class: 'section-title'
            }
        });

        editor.BlockManager.add('h2-block', {
            label: 'Heading',
            content: '<h2>Titre H2</h2>',
            media: `<?= service('theme')->getSVG('icons/duotone/Text/H2.svg', "svg-icon svg-icon svg-icon-3x"); ?>`,
            editable: true,
            draggable: true,
            stylable: true,
            selectable: true,
            category: 'Basic',
            attributes: {
                title: 'Insert h1 block', 
                class: 'section-into'
            }
        });

        editor.BlockManager.add('my-block', {
            label: 'Block',
            textable: 1, 
            content: `<div style="...">custom stuff / custom components</div>`,
        });

        // editor.BlockManager.add('carousels-block', {
        //     label: 'Carousels',
        //     media: `<?= '' ; //service('theme')->getSVG('icons/duotone/Code/Code.svg', "svg-icon svg-icon svg-icon-3x"); ?>`,
        //     textable: 1, 
        //     category: 'Basic',
        //     content: '<div style="...">[Ci4Carousels id="*" type="*"]</div>',
        //     attributes: {
        //         placeholder: 'Id de votre carousel'
        //     }
        // });

        const domComponents = editor.DomComponents;
        domComponents.getTypes().map(type => {
            domComponents.addType(type.id, {
            model: {
                initToolbar(){
                var model = this;
                if(!model.get('toolbar')) {
                    var tb = [{
                    attributes: {class: 'fa fa-arrow-up'},
                    command: e => e.runCommand('core:component-exit', {
                        force: 1
                    })
                    }];
                    if(model.get('draggable')) {
                    tb.push({
                        attributes: {class: 'fa fa-arrow-down'},
                        command: 'tlb-move',
                    });
                    }
                    if(model.get('copyable')) {
                    tb.push({
                        attributes: {class: 'fa fa-clone'},
                        command: 'tlb-clone',
                    });
                    }
                    if(model.get('removable')) {
                    tb.push({
                        attributes: {class: 'fa fa-trash'},
                        command: 'tlb-delete',
                    });
                    }
                    tb.push({
                        attributes: {class: 'fa fa-gear'},
                        command: 'tlb-openInfo',
                    });
                    model.set('toolbar', tb);
                }
                },
                defaults: {
                // toolbar,
                // traits:[
                //   ...editor.Components.getType(type.id).model.prototype.defaults.traits,
                //   ...[
                //   ]
                // ],
                },
            }
            })
        });

        editor.DomComponents.addType('carousels-block', {
            isComponent: el => el.tagName === 'CAROUSEL',
            model: {
            defaults: {
                tagName: 'module',
                traits: [
                    'data-type', 
                    'data-id',
                    'data-format'
                ],
                // As by default, traits are binded to attributes, so to define
                // their initial value we can use attributes
                // //attributes: { type: 'carousel' },
                // init() {
                //     this.on('change:attributes:value', this.handleChange);
                //     this.handleChange();
                // },
                // handleChange() {
                //     const name = this.getAttributes().name || 0;
                //     this.components(`Carousel: ${name}`);
                // }
            },
            },
        });

          // Custom trait type
        editor.TraitManager.addType('carousel', {
           // templateInput: 'test',
            ///createInput({ trait }) {
            // console.log(Vue);
                // const vueInst = new Vue({ render: h => h(Vuecarousel) }).$mount();
                // const carouselInst = vueInst.$children[0];
                // carouselInst.$on('change', ev => this.onChange(ev));
                // this.carouselInst = carouselInst;
                // return vueInst.$el;
         //   },

            // onEvent({ component }) {
            //     const value = this.carouselInst.getValue() || 0;
            //     component.addAttributes({ value });
            // },

            // onUpdate({ component }) {
            //     const value = component.getAttributes().value || 0;
            //     this.carouselInst.setValue(value);
            // },
            // onEvent({ elInput, component }) {
            //     const inputType = elInput;
            //    // let data-id = 12;
            //     console.log(inputType);
            //    // component.addAttributes({ data-id });
            // }
        });

        editor.BlockManager.add('carousels-block', {
            label:'Content Link',
            media: `<?= service('theme')->getSVG('icons/duotone/Code/Compiling.svg', "svg-icon svg-icon svg-icon-3x"); ?>`,
            category:'Contents',
            attributes: { class:'fa fa-graduation' },
            content:[
               { type:'carousels-block'},
                `<style>
                module {
                    display: flex;
                    padding: 10px;
                    min-height: 75px;
                    max-width: 100%
                }
                </style>`,
            ]
        });


//          // define this event handler after editor is defined
//   // like in const editor = grapesjs.init({ ...config });
//   editor.on('component:selected', () => {

//         // whenever a component is selected in the editor

//         // set your command and icon here
//         const commandToAdd = 'tlb-openInfo';
//         const commandIcon = 'fa fa-gear';

//         // get the selected componnet and its default toolbar
//         const selectedComponent = editor.getSelected();
//         const defaultToolbar = selectedComponent.get('toolbar');

//         // check if this command already exists on this component toolbar
//         const commandExists = defaultToolbar.some(item => item.command === commandToAdd);

//         // if it doesn't already exist, add it
//         if (!commandExists) {
//         selectedComponent.set({
//             toolbar: [ ...defaultToolbar, {  attributes: {class: commandIcon}, command: commandToAdd }]
//         });
//         }

//     });
    const commands = editor.Commands;
    commands.add('tlb-openInfo', {
        run(editor, sender) {
            editor.Modal.open({
                title: 'Modal example',
                content: 'My content',
            });
        },
        stop(editor, sender) {
            editor.Modal.close();
        },
    });

        // const deviceManager = editor.Devices;

        // const device1 = deviceManager.add({
        //     // Without an explicit ID, the `name` will be taken. In case of missing `name`, a random ID will be created.
        //     id: 'desktop',
        //     name: 'Desktop',
        //     width: '1080px', // This width will be applied on the canvas frame and for the CSS media
        // });

        // const device2 = deviceManager.add({
        //     // Without an explicit ID, the `name` will be taken. In case of missing `name`, a random ID will be created.
        //     id: 'tablet',
        //     name: 'Tablet',
        //     width: '900px', // This width will be applied on the canvas frame and for the CSS media
        // });
        // const device3 = deviceManager.add({
        //     id: 'tablet2',
        //     name: 'Tablet 2',
        //     width: '800px', // This width will be applied on the canvas frame
        //     widthMedia: '810px', // This width that will be used for the CSS media
        //     height: '600px', // Height will be applied on the canvas frame
        // });

        // const device4 = deviceManager.add({
        //     id: 'mobile',
        //     name: 'Mobile 2',
        //     width: '320px', // This width will be applied on the canvas frame
        //     widthMedia: '480px', // This width that will be used for the CSS media
        //     height: '500px', // Height will be applied on the canvas frame
        // });

        // const device = deviceManager.get('Tablet');
        // console.log(JSON.stringify(device));

        // const devices = deviceManager.getDevices();
        // console.log(JSON.stringify(devices));

        // editor.Panels.addPanel({
        //     id: 'panel-devices', buttons: [
        //         { id: "set-device-desktop", command: function (e) { return e.setDevice("Desktop") }, className: "fa fa-desktop", active: 1 },
        //         { id: "set-device-tablet", command: function (e) { return e.setDevice("Tablet") }, className: "fa fa-tablet" },
        //         { id: "set-device-mobile", command: function (e) { return e.setDevice("Mobile portrait") }, className: "fa fa-mobile" }
        //     ]
        // });
    }


    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

// Initialization
jQuery(document).ready(function() {
    KTBuilderPage.init();
});

</script>

<?= $this->endSection() ?>