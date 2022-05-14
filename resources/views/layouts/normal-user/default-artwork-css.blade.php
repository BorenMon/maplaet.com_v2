<style>
  #backdrop {
    background-color: rgba(0, 0, 0, 0.7);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 15;
  }

  #saved-backgrounds {
    margin-left: 1.75rem;
    margin-right: 1.75rem;
    margin-top: 1rem;
    border-width: 2px;
    border-style: dashed;
    --tw-border-opacity: 1;
    border-color: rgb(209 213 219 / var(--tw-border-opacity));
    padding: 1rem;
  }

  #saved-backgrounds .saved-background {
    padding-top: 100%;
    position: relative;
  }

  #saved-backgrounds .saved-background i {
    position: absolute;
    top: 0.75rem;
    right: 0.75rem;
    cursor: pointer;
    font-size: 1.25rem;
    line-height: 1.75rem;
    --tw-text-opacity: 1;
    color: rgb(235 70 85 / var(--tw-text-opacity));
  }

  #saved-backgrounds .saved-background img {
    position: absolute;
    top: 50%;
    left: 50%;
    max-height: 100%;
    max-width: 100%;
    --tw-translate-x: -50%;
    --tw-translate-y: -50%;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    cursor: pointer;
  }

  #saved-backgrounds .saved-background.selected {
    border-width: 2px;
    --tw-border-opacity: 1;
    border-color: rgb(10 37 77 / var(--tw-border-opacity));
  }

  .customized-container {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .customized-container #input-container {
    margin-top: 2rem;
    width: calc(100% - 3rem);
  }

  .customized-container #input-container button {
    color: white;
  }

  .customized-container #input-container * {
    font-family: "Stem-Regular", "Krasar-Regular";
  }

  @media (min-width: 800px) {
    #_1 {
      text-align: left;
    }

    .customized-container {
      flex-direction: row;
      justify-content: space-between;
    }
    .customized-container #input-container {
      width: calc(100% - 36vw - 2rem);
    }

    #saved-backgrounds {
      margin-left: 0px;
      margin-right: 0px;
    }

    #saved-backgrounds {
      margin-top: 3.5rem;
    }
  }
</style>