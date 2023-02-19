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
        const inventory = document.createElement("div");
        inventory.setAttribute("id", "inventory");
        frame.appendChild(inventory);

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
