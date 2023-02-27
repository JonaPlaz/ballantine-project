export const atmosphere = {
  getAtmosphere: (element, frame) => {
    const atmosphereName = element.atmosphere.name;
    switch (atmosphereName) {
      case "black":
        const textAreaCenter = document.createElement("div");
        textAreaCenter.setAttribute("id", "text_area_center");
        frame.appendChild(textAreaCenter);
        break;
      case "office_beaulieu_001":
        const officeBeaulieuOne = document.createElement("div");
        officeBeaulieuOne.setAttribute("id", "office_beaulieu_001");
        frame.appendChild(officeBeaulieuOne);

        const textAreaRightOne = document.createElement("div");
        textAreaRightOne.setAttribute("id", "text_area_right");
        frame.appendChild(textAreaRightOne);
        break;
      case "office_beaulieu_002":
        const backpack = document.createElement("div");
        backpack.setAttribute("id", "backpack_left");
        frame.appendChild(backpack);

        const inventory = document.createElement('div');
        inventory.setAttribute('id', 'inventory')
        backpack.appendChild(inventory);

        const inventoryTitle = document.createElement('i');
        inventoryTitle.setAttribute('class', 'backpack_title')
        inventoryTitle.textContent = 'inventaire';
        inventory.appendChild(inventoryTitle);

        

        const map = document.createElement('div');
        map.setAttribute('id', 'map')
        backpack.appendChild(map);

        const mapTitle = document.createElement('h2');
        mapTitle.setAttribute('class', 'backpack_title')
        mapTitle.textContent = 'cartes';
        map.appendChild(mapTitle);

        const officeBeaulieuTwo = document.createElement("div");
        officeBeaulieuTwo.setAttribute("id", "office_beaulieu_002");
        frame.appendChild(officeBeaulieuTwo);

        const textAreaRightTwo = document.createElement("div");
        textAreaRightTwo.setAttribute("id", "text_area_right");
        frame.appendChild(textAreaRightTwo);
        break;
    }
  },
};
