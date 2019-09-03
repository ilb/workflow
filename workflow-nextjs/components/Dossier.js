import React, { Suspense, useState, useEffect, useRef } from 'react';
import { Table, Button, Message, Loader } from 'semantic-ui-react';
import { DefaultApi as DossierApi} from '@ilb/filedossier-api/dist';
import DossierResource from './DossierResource';

function Dossier( dossier) {
  // console.log('dossier',dossier);
    const { dossierKey, dossierPackage, dossierCode } = dossier.activityDossier;

    const dossierApi = new DossierApi();
    const dossierResource = new DossierResource(dossierApi, {dossierKey, dossierPackage, dossierCode});
    // const [dossier, getDossier] = useResource(() => dossierResource.getDossier());

    return (
      <div style={{marginTop: '30px'}} className="fileDosser">
         <div>
          <div className="ui dividing header" style={{width: '100%'}}>{dossier.name}</div>
            {dossier.dossierFile &&
              <Table celled>
                <Table.Header>
                    <Table.Row>
                        <Table.HeaderCell>Файл</Table.HeaderCell>
                        <Table.HeaderCell>Управление</Table.HeaderCell>
                    </Table.Row>
                </Table.Header>

                <Table.Body>
                    {dossier.dossierFile.map(file => (
                      <DossierFile
                          key={file.code}
                          file={file}
                          link={getDownloadLink(dossier, file.code)}
                          // onChange={getDossier}
                          resource={dossierResource(file.code)}
                          />
                    ))}
                </Table.Body>
              </Table>
            }
          </div>
      </div>
    );
}
function getDownloadLink(dossier, fileCode) {
    return 'https://devel.net.ilb.ru/workflow-web/web/v2' + '/dossiers/' + dossier.dossierKey + '/' + dossier.dossierPackage + '/' + dossier.code + '/dossierfiles/' + fileCode;
}


function DossierFile( { file: { code, name, exists, readonly }, onChange, resource, link }) {

    const inputFileEl = useRef(null);

    const remove = () => {
        console.log('code', code);
        onChange();
    };

    const upload = () => {
        //console.log('upload', code, inputFileEl.current.files);
        const files = inputFileEl.current.files;

//        const formData = new FormData();
//
//        for (var i = 0; i < files.length; i++) {
//            formData.append(i, files.item(i));
//        }

        resource.uploadContents(inputFileEl.current.files[0]);
        onChange();
    };


    return (
      <Table.Row>
          <Table.Cell>
          {exists && <a href={link}>{name}</a>}
          {(!exists || true) && name }
          </Table.Cell>
          <Table.Cell>
              {(!readonly || true) && <div>
                <Button content="Удалить" onClick={remove}/>
                <input ref={inputFileEl} type="file" name="file" onChange={upload}/>
            </div>}
          </Table.Cell>
      </Table.Row>
      );
}

export default Dossier;
