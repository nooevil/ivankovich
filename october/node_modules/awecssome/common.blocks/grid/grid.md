# Grid module for aweCSSome framework

## Grid system

By default grid system is based on 24 columns (tracks). It's like 12 columns but more flexible since it can be split into 2, 3, 4 and even 6, 8 and 12 equal parts! But you can configure the number of columns following your requirements.

The page grid is generated based on CSS Grid Layout Module Level 1. The `grid-template-columns` property is used for specifying the track list for the grid’s columns, `grid-template-areas` property is used for specifying named grid areas, and `grid-area` property is used to lay out (associate with particular grid item) main blocks (grid items) on a page.

The default grid system settings are stored in CSS custom properties and are below (px units):

```
--grid-columns-number: 24;              # columns quantity
--grid-columns-min: 13;                 # min width for column (track)
--grid-columns-max: 90;                 # max width for column (track)
--grid-column-percentage-size: 
calc(100% / var(--grid-columns-number)) # percentage size of a grid column in current context
--grid-gap: 0;                          # column gutter width
--max-width: 1920;                      # max width for page wrapper
```

Min width of the page wrapper is set automatically by multiplying of `--grid-columns-number` on `--grid-columns-min` custom properties (variables). Max width is set manually by the direct value of `--max-width` custom property.

FYI, using equal values for `--grid-columns-min` and `--grid-columns-max` custom properties leads to fixed column width, which isn't appropriate for the mobile first approach!

## Break points

Grid system doesn't force any device-oriented approach. But we recommend to use the mobile first approach with these breakpoints below:

```
@media (min-width: 576px) { … }     # small devices (landscape phones, 576px and up)

@media (min-width: 768px) { … }     # medium devices (tablets, 768px and up)

@media (min-width: 992px) { … }     # large devices (desktops, 992px and up)

@media (min-width: 1200px) { … }    # extra large devices (large desktops, 1200px and up)
```

## Layout templates

Use `.grid` CSS class for the page main wrapper. As mentioned ahead main page blocks must be layed out on a page using `grid-area` property.

There is a special custom property `--grid-template-areas` for configuring page template trough breakpoints:

```
.grid {
    grid-template-areas: --grid-template-areas;
}
```

For specifying layouts for different pages you can add more custom properties like `--grid-catalog-template-areas`, `--grid-gallery-template-areas` etc.

## Subgrids

Due to the fact that Subgrids section from CSS Grid Layout Module Level 2 specification isn't implemented in the browser at the moment, we have to forward subgrids manually in grid container items.

Add utility CSS class `.subgrid` to a grid item in the markup (HTML) to make it a new grid container with the same number of columns. If the column number of this subgrid must be different specify it in `--grid-columns-number` custom property scoped in block selector.

## Full width block

Grid system allows limiting the main content area to less than the whole wrapper width. Just change `--grid-columns-max` custom property to 50 and it will make the page content area of 1200px width centered inside the wrapper.

In this case, you are able to expand blocks to the full width by adding `.full-width` CSS class to them.

`.subgrid` and `.full-width` can be combined to get an expanded block with a subgrid.

## Column percentage size

`--grid-column-percentage-size` custom property returns the actual size of a grid column depending on the current value (in cascade) of `--grid-columns-number`.

It would be useful, for example, for setting gutters (`column-gap` CSS property) equal to the column size in current grid container or for sizing items following the current grid in a current non-grid container.

In case you need a multiplied value of `--grid-column-percentage-size` custom property use `calc()` function. For example multiplication to 2 will looks like this `width: calc(var(--grid-column-percentage-size) * 2)`.
