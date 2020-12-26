# Button block

Button is a logically and functionally independent reusable page component ([block](https://en.bem.info/methodology/key-concepts/#block)), which represents a control allowing a user to trigger actions on the page.

HTML implementation:

```
<button class="button" type="button">Button</button>
```

It's possible to represent hyperlink as a button with appereance.

HTML implementation:

```
<a class="button" href="#">button</a>
```
## Using

Add `@import "button.css";` file to your CSS or `@import "button-export.css";` if you need modifiers.

## Modification methods

The default behavior and appereance of the button block can modified using next BEM [modification methods](https://en.bem.info/methodology/block-modification/):

*   [Modifiers](https://en.bem.info/methodology/block-modification/#using-a-modifier-to-change-a-block)
*   [Mixes](https://en.bem.info/methodology/block-modification/#using-a-mix-to-change-a-block)
*   [Redefinition levels](https://en.bem.info/methodology/block-modification/#using-redefinition-levels-to-change-a-block)

### Modification by modifiers

Use a [modifier](https://en.bem.info/methodology/block-modification/#using-a-modifier-to-change-a-block) to change one specific instance of a block without affecting surrounding blocks.

The button block has pedefined modifiers:

```
.button_x-large     /* increase size to 140% */
.button_large       /* increase size to 120% */
.button_small       /* decrease size to 80% */
.button_x-small     /* decrease size to 60% */
.button_ghost       /* make a ghost button (transparent background) */
.button_border-zero /* make possibile using gradient background and inset shadows on borders */
```

Let's increase the button block size by adding `.button_large` modifier which will increase its size to 120%.

HTML implementation:

```
<button class="button button_large" type="button">Button</button>
```

You can add any number of modifiers to a block. For example add `button_ghost` to the prevoius example to make ghost button;

HTML implementation:

```
<button class="button button_large button_ghost" type="button">default</button>
```

You can add your custom modifiers by [redefinition levels](#Modification%20by%20redefinition%20levels).

### Modification by mixes

Use a [mix](https://en.bem.info/methodology/block-modification/#using-a-mix-to-change-a-block) to place additional BEM entities on the same DOM node as the block to combine the behavior and style of multiple entities without duplicating code and affecting surrounding blocks.

Let's place the button block in the right top corner inside `.modal` block. In the BEM methodology, a block's position on the page is set in the parent block as their element and is mixed with the placed block. This allows the blocks to be independent and reusable.

HTML implementation:

```
<div class="modal">
    <button class="button modal__button" type="button">close</button>
    <p>Content goes here...</p>
</div>
```

CSS implementation:

```
.modal__button {
    position: absolute;
    top: 10px;
    right: 10px;
}
```

### Modification by redefinition levels

Use a [redefinition levels](https://ru.bem.info/methodology/redefinition-levels) to change the default look of the button block to fit your project design.

Changes are made to the block by combining the block custom and regular properties from different redefinition levels. Blocks can be [extended and redefined](https://en.bem.info/methodology/redefinition-levels/#changing-the-block-implementation) on a separate level and applied during assembly.

Redefining is the changing the existing (predefined) custom properties of the button block while extending is the adding new properties to it.

File structure with the new rules for the button (button.css) on the project.blocks level:

```
project/
    library.blocks/
        button/
            button.css  # original CSS implementation of the button in the library
    project.blocks/
        button/
            button.css  # redefinition on the project level
```

The button block has next predefined custom properties:

```
  /* Box */
  --button-border-width
  --button-border-radius
  --button-padding-vertical
  --button-padding-horizontal

  /* Typographic */
  --button-font-size
  --button-font-weight
  --button-font-family
  --button-line-height

  /* Colors */
  --button-border-color
  --button-color
  --button-background-color
```

Let's change the button block color by redefining the CSS rules for the block on the project level (project.blocks) by setting the values of the necessary custom properties.

CSS implementation:

```
.button {
  --button-border-color: aqua;
  --button-background-color: aqua;
}
```

Furthermore let's add to the button block blue glow in cursor hover condition by redefining the CSS rules for the block on the project level (project.blocks) by adding necessary regular property and set its value.

CSS implementation:

```
.button {
    box-shadow: 0px 0px 15px 0px rgba(0, 0, 255, 0.75);
}
```

As a result, rules from both redefinition levels should be compiled by your build script and applied to the button block.
