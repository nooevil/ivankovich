import UrlGeneration from '@lovata/url-generation';
import CatalogList from '../../catalog-list/catalog-list';

export default new class FilterChecked {
  constructor() {
    this.sRemoveButtonClass = 'filter-checked__remove';
    this.sClearButtonClass = 'filter-checked__reset';

    this.init();
  }

  init() {
    $(document).on('click', `.${this.sRemoveButtonClass}`, (obEvent) => {
      const obButton = $(obEvent.currentTarget);
      const iPropertyID = obButton.attr('data-property-id');

      let sFieldName = obButton.attr('data-filter-name');
      if (iPropertyID.length > 0) {
        sFieldName += `[${iPropertyID}]`;
      }

      UrlGeneration.init();
      UrlGeneration.remove(sFieldName);
      UrlGeneration.update();

      CatalogList.obListHelper.send();
    });

    $(document).on('click', `.${this.sClearButtonClass}`, () => {
      UrlGeneration.clear();

      CatalogList.obListHelper.send();
    });
  }
}();
