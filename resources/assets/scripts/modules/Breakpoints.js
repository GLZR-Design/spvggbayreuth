class Breakpoints {

    constructor() {
        this.breakpoints = {
            mobile: "576px",
            navbar: "992px",
            tablet: "1024px",
            laptop: "1440px",
        };

        this.breakpointsDown = {
            mobile: window.matchMedia(`max-width: ${breakpoints.mobile}`).matches,
            navbar: window.matchMedia(`(max-width: ${breakpoints.navbar})`).matches,
            tablet: window.matchMedia(`max-width: ${breakpoints.tablet}`).matches,
            laptop: window.matchMedia(`max-width: ${breakpoints.laptop}`).matches,
        };
    }

}

export default Breakpoints;
export const NAVBAR = "992px";