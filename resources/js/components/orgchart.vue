<template>
    <div ref="svgElementContainer"></div>
</template>

<script>
import * as TreeChart from "d3-org-chart";

export default {
    name: "Chart",
    data() {
        return {
            chartReference: null,
            data: []
        };
    },
    created() {
        console.log("created: " + this.TreeChart);
    },
    mounted() {
        /*
        fetch(
            "https://gist.githubusercontent.com/bumbeishvili/dc0d47bc95ef359fdc75b63cd65edaf2/raw/c33a3a1ef4ba927e3e92b81600c8c6ada345c64b/orgChart.json"
        )
            .then(d => d.json())
            .then(d => {
                console.log("fetched data");
                this.renderChart(d);
            });*/

        this.dataGeneration([
            {
                name: "Mr. LEMRAZI Nabil",
                imageUrl:
                    "https://unefi.io/wp-content/uploads/2019/03/nabil.jpg",
                area: "Corporate",
                office: "CTO office",
                unit: { type: "business", value: "Business first" },
                positionName: "Cheaf Executive Officer ",
                id: "O-1",
                parentId: null
            },
            {
                name: "Dr. EL KADIRI Mounir",
                imageUrl:
                    "https://unefi.io/wp-content/uploads/2019/04/moulay-mounir.jpg",
                office: "CEO office",
                unit: { type: "business", value: "Business one" },
                positionName: "CTO ",
                id: "O-2",
                parentId: "O-1"
            },
            {
                name: "Mr. BENGARAI Tarik",
                imageUrl:
                    "https://unefi.io/wp-content/uploads/2019/04/AAEAAQAAAAAAAAJyAAAAJGIzMzhjYWNhLWI1N2YtNGRhYy1hNmY5LTAxODcwNjUzZGY4Ng.jpeg",
                office: "CEO office",
                unit: { type: "business", value: "Business one" },
                positionName: "CTO ",
                id: "O-3",
                parentId: "O-1"
            },
            {
                name: "Mr. Amino Wail",
                imageUrl:
                    "https://unefi.io/wp-content/uploads/2019/04/1111-1.jpg",
                office: "CEO office",
                unit: { type: "business", value: "Business one" },
                positionName: "CTO ",
                id: "O-4",
                parentId: "O-1"
            }
        ]);

        this.renderChart(this.data);
    },
    methods: {
        renderChart(data) {
            console.log("rendering graph", this.$refs.svgElementContainer);
            if (!this.chartReference) {
                this.chartReference = new TreeChart();
            }
            this.chartReference
                .container(this.$refs.svgElementContainer) // node or css selector
                .data(data)
                .svgWidth(500)
                .initialZoom(0.4)
                .onNodeClick(d => console.log(d + " node clicked"))
                .render();
            console.log(data);
        },
        dataGeneration(myData) {
            this.data = myData.map(d => {
                const width = Math.round(Math.random() * 50 + 300);
                const height = Math.round(Math.random() * 20 + 130);
                const cornerShape = ["ORIGINAL", "ROUNDED", "CIRCLE"][
                    Math.round(Math.random() * 2)
                ];
                const nodeImageWidth = 100;
                const nodeImageHeight = 100;
                const centerTopDistance = 0;
                const centerLeftDistance = 0;
                const expanded = false; //d.id=="O-6"

                const titleMarginLeft =
                    nodeImageWidth / 2 + 20 + centerLeftDistance;
                const contentMarginLeft = width / 2 + 25;
                return {
                    nodeId: d.id, // node identificator
                    parentNodeId: d.parentId, // parent node identificator
                    width: width, // node card width
                    height: height, // node card height
                    borderWidth: 1, // node card border width
                    borderRadius: 15, // node card border radius
                    borderColor: {
                        // border color
                        red: 15,
                        green: 140,
                        blue: 121,
                        alpha: 1
                    },
                    backgroundColor: {
                        // background color of node card
                        red: 0,
                        green: 81,
                        blue: 90,
                        alpha: 1
                    },
                    nodeImage: {
                        // node image properties
                        url: d.imageUrl, // url to image
                        width: nodeImageWidth, // image width
                        height: nodeImageHeight, // image height
                        centerTopDistance: centerTopDistance, // vertical distance from center
                        centerLeftDistance: centerLeftDistance, // horizontal distance from node center
                        cornerShape: "CIRCLE", // corner shape, can be 'ORIGINAL','ROUNDED','CIRCLE'
                        shadow: false, // if image has shadow (if yes, performance may be poor for 50+ visible nodes)
                        borderWidth: 0, // image border width
                        borderColor: {
                            // image border color
                            red: 19,
                            green: 123,
                            blue: 128,
                            alpha: 1
                        }
                    },
                    nodeIcon: {
                        icon: "https://to.ly/1yZnX",
                        size: 30
                    },
                    // node card content
                    template: `<div>
                  <div style="margin-left:${titleMarginLeft}px;
                              margin-top:10px;
                              font-size:20px;
                              font-weight:bold;
                         ">${d.name} </div>
                 <div style="margin-left:${titleMarginLeft}px;
                              margin-top:3px;
                              font-size:16px;
                         ">${d.positionName} </div>

                 <div style="margin-left:${titleMarginLeft}px;
                              margin-top:3px;
                              font-size:14px;
                         ">${d.unit.value}</div>

                 <div style="margin-left:${contentMarginLeft}px;
                             margin-top:15px;
                             font-size:13px;
                             position:absolute;
                             bottom:5px;
                            ">
                      <div>${d.office}</div>
                      <div style="margin-top:5px">${d.area}</div>
                 </div>
              </div>`,
                    connectorLineColor: {
                        // Edge color
                        red: 11,
                        green: 123,
                        blue: 108,
                        alpha: 1
                    },
                    connectorLineWidth: 5, // Edge width
                    dashArray: "", // We can have stripped edges, you should specify dashArray for it (google: svg dashArray)
                    expanded: expanded, // If we want node to be expanded,
                    directSubordinates: 4,
                    totalSubordinates: 1515
                };
            });
        }
    }
};
</script>

<style scoped>
h3 {
    margin: 40px 0 0;
}
ul {
    list-style-type: none;
    padding: 0;
}
li {
    display: inline-block;
    margin: 0 10px;
}
a {
    color: #42b983;
}
</style>
