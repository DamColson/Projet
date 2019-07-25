<div class="bigSearch">
            <form id="search" action="View/searchView.php" method="get">


                <fieldset class="text-center row no-gutters text-light">
                    <div class="form-group col-lg-2"></div>
                    <div class="form-group col-lg-8">
                        <label for="searchBar">Rechercher un membre et/ou un Syndicat :</label>
                        <div class="rem"></div>
                        <input class="form-control mr-sm-2" name="searchBar" id="searchBar" type="search" aria-label="Search" />
                        <div class="rem"></div>
                    </div>

                    <div class="form-group col-lg-2"></div>
                    
                    
                    <div class="form-group offset-md-4 offset-xl-2 col-xl-4 col-lg-4 col-12 text-left">
                            <div class="mb-2 mx-auto">
                                
                                <input class="mr-1" type="checkbox" name="meridianCheckbox" id="meridianCheckbox" value="Steel Meridian" />
                                <label for="meridanCheckbox">Steel Meridian</label>
                                
                            </div>
                            <div class="mb-2 mx-auto">
                                <input class="mr-1" type="checkbox" name="arbiterCheckbox" id="arbiterCheckbox" value="Arbiter Of Hexis" />
                                <label for="arbiterCheckbox">Arbiter Of Hexis</label>
                            </div>
                            <div class="mb-2 mx-auto">
                                <input class="mr-1" type="checkbox" name="cephalonCheckbox" id="cephalonCheckbox" value="Cephalon Suda" />
                                <label for="cephalonCheckbox">Cephalon Suda</label>
                            </div>
                    </div>
                     
                    <div class="form-group offset-md-4 offset-xl-0 col-xl-4 col-lg-4 col-12 text-left">
                            <div class="mb-2 mx-auto">    
                                <input class="mr-1" type="checkbox" name="perrinCheckbox" id="perrinCheckbox" value="The Perrin Sequence" />
                                <label for="perrinCheckbox">The Perrin Sequence</label>
                            </div>
                            <div class="mb-2 mx-auto">
                                <input class="mr-1" type="checkbox" name="redVeilCheckbox" id="redVeilCheckbox" value="Red Veil" />
                                <label for="redVeilCheckbox">Red Veil</label>
                            </div> 
                            <div class="mb-2 mx-auto">
                                <input class="mr-1" type="checkbox" name="lokaCheckbox" id="lokaCheckbox" value="New Loka" />
                                <label for="lokaCheckbox">Cephalon Suda</label>
                            </div>
                    </div>    

                 
                    <div class="rem"></div>
                </fieldset>

                <div class="rem"></div>
                <div class="align-items-center justify-content-center d-flex">
                    <button type="button" class="btn btn-outline-light my-2 my-sm-0 mr-2 closeSearchModal" id="closeSearchModal">Fermer</button>
                    <button type="submit"  class="btn btn-outline-light my-2 my-sm-0" id="searchButton" >Recherche</button>
                </div>
            </form>

        </div>