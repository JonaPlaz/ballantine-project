export const atmosphere = {
  getAtmosphere: (element) => {
    const frame = document.querySelector("#frame");
    const atmosphereName = element.atmosphere.name;
    switch (atmosphereName) {
      case "black":
        const textAreaCenter = document.createElement('div');
        textAreaCenter.setAttribute('id', 'textArea');
        frame.appendChild(textAreaCenter);
        break;
      case "office_beaulieu_001":
        const inventory = document.createElement('div');
        inventory.setAttribute('id', 'inventory');
        frame.appendChild(inventory);

        const officeBeaulieuOne = document.createElement('div');
        officeBeaulieuOne.setAttribute('id', 'office_beaulieu_001');
        frame.appendChild(officeBeaulieuOne);

        const textAreaRight = document.createElement('div');
        textAreaRight.setAttribute('id', 'text_area');
        frame.appendChild(textAreaRight);
        break;
    }
  },
};
